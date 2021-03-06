<?php

/**
 * 日報 マッパー
 *
 * @group mapper
 *
 */

class NipposMapper extends DataMapper
{
    const TABLE_NAME  = 'Nippos';
    const SEQUENCE_ID = 'id';

    /**
     * 日報が登録されているかどうか
     *
     */
    function isExists($tenpo_id)
    {
        $conditions = array(
            'is_deleted = ' => FLAG_OFF,
            'tenpo_id   = ' => $tenpo_id,
        );

        $cnt = $this->getCount(array('conditions' => $conditions));

        if ($cnt > 0) {
            return true;
        }

        return false;
    }

    /**
     * 前日より繰越した現金を取得
     *
     */
    function getKurikoshi($tenpo_id, $date)
    {
        $obj_date = new DateTime($date);
        $obj_date->modify('-1 day');

        // 直近の「日次締め済」および「チェック済」の日報がない場合は0
        if (!$row = $this->getLast($tenpo_id, array(NIPPO_STATUS_CLOSED, NIPPO_STATUS_FINISHED), $obj_date->format('Y-m-d'))) {
            return 0;
        }

        // 取得した日報が前日より前のものである場合は0
        //if ($row->date < $obj_date) {
        //    return 0;
        //}
        // ※店舗に稼働フラグを追加したことにより、対象の日報の日付が必ずしも前日ではなくなったのでコメントアウトします。

        return $row->register;
    }

    /**
     * 直近の日報を取得
     *
     */
    function getLast($tenpo_id, $status = null, $date = null)
    {
        $conditions = array(
            'is_deleted = ' => FLAG_OFF,
            'tenpo_id   = ' => $tenpo_id,
        );

        if (!is_null($status)) {
            if (is_array($status)) {
                $conditions['status IN '] = $status;
            } else {
                $conditions['status = '] = $status;
            }
        }

        if (!is_null($date)) {
            $obj_date = new DateTime($date);

            $conditions['date <= '] = $obj_date->format('Y-m-d');
        }

        $row = $this->find(array(
            'conditions' => $conditions,
            'order'      => array('date' => 'desc'),
        ));

        return $row;
    }

    /**
     * 日次締めの可否チェック
     *
     */
    function isPossibleClose($tenpo_id, $date)
    {
        $obj_date = new DateTime($date);

        // 前提条件 ------------------------------------------------------------

        // 日報の日付が今日以前である
        if ($obj_date->date >= $this->_now) {
            return false;
        }

        // 日報のレコードが存在する
        if (!$row = $this->find(array('conditions' => array('is_deleted = ' => FLAG_OFF, 'tenpo_id = ' => $tenpo_id, 'date = ' => $date)))) {
            return false;
        }

        // 日報のステータスが「店舗処理中」である
        if ($row->status != NIPPO_STATUS_PROCESSING) {
            return false;
        }

        // クリア条件 ----------------------------------------------------------

        // 過去に一つも「チェック済」および「日次締め済」の日報がない場合はOK
        if (!$row = $this->getLast($tenpo_id, array(NIPPO_STATUS_CLOSED, NIPPO_STATUS_FINISHED))) {
            return true;
        }

        // 直近の「チェック済」および「日次締め済」の日報が前日のものである場合はOK
        if ($row->date == $obj_date->modify('-1 day')) {
            return true;
        }

        $conditions = array(
            'is_deleted = ' => FLAG_OFF,
            'tenpo_id   = ' => $tenpo_id,
            'status     = ' => NIPPO_STATUS_PROCESSING,
            'date BETWEEN ' => array($row->date->format('Y-m-d'), $obj_date->format('Y-m-d')),
        );

        $cnt = $this->getCount(array('conditions' => $conditions));

        // 直近の「チェック済」および「日次締め済」の日報までに「店舗処理中」の日報がない場合はOK
        if ($cnt == 0) {
            return true;
        }

        return false;
    }

    /**
     * 日次締めの可否チェック（休業日締め）
     *
     */
    function isPossibleCloseAtHoliday($tenpo_id, $date)
    {
        $obj_date = new DateTime($date);

        // 前提条件 ------------------------------------------------------------

        // 日報の日付が今日以前である
        if ($obj_date->date >= $this->_now) {
            return false;
        }

        if ($row = $this->find(array('conditions' => array('is_deleted = ' => FLAG_OFF, 'tenpo_id = ' => $tenpo_id, 'date = ' => $date)))) {
            // ステータスが「店舗処理中」である
            if ($row->status != NIPPO_STATUS_PROCESSING) {
                return false;
            }
        }

        // クリア条件 ----------------------------------------------------------

        // 過去に一つも「チェック済」および「日次締め済」の日報がない場合はOK
        if (!$row = $this->getLast($tenpo_id, array(NIPPO_STATUS_CLOSED, NIPPO_STATUS_FINISHED))) {
            return true;
        }

        // 直近の「チェック済」および「日次締め済」の日報が前日のものである場合はOK
        if ($row->date == $obj_date->modify('-1 day')) {
            return true;
        }

        return false;
    }

    /**
     * 税理士事務所確認の可否チェック
     *
     */
    function isPossibleFinish($tenpo_id, $date)
    {
        // 日報のステータスが「日次締め済」である
        $row = $this->find(array('conditions' => array('is_deleted = ' => FLAG_OFF, 'tenpo_id = ' => $tenpo_id, 'date = ' => $date)));

        if (!$row || $row->status != NIPPO_STATUS_CLOSED) {
            return false;
        }

        $obj_date = new DateTime($date);

        // 過去に一つも「チェック済」の日報がない場合はOK
        if (!$row = $this->getLast($tenpo_id, NIPPO_STATUS_FINISHED)) {
            return true;
        }

/*
		//前日チェックがあった場合だけ締めれるのはやめて、間近のデータがチェック済みだったらOK
        // 直近の「チェック済」の日報が前日のものである場合はOK
        if ($row->date == $obj_date->modify('-1 day')
         && $row->status == NIPPO_STATUS_FINISHED
        ) {
            return true;
        }
*/

		$after_date = $row->date;//チェック済の日付
		$after_date = $after_date->format('Y-m-d');//フォーマットする
		
		
		$query = array();
		
		//チェック済の次のデータを抽出(ある分全部)
		$query[] = "SELECT *";
        $query[] = "FROM `nippos`";
        $query[] = "WHERE `tenpo_id` = $tenpo_id";
        //$query[] = "AND `company_id` = $company_id";
        $query[] = "AND `date` > '$after_date'";//チェック済の日報の日付
        $query[] = "AND `date` <= '$date'";//今見てる日報の日付
		$query[] = "ORDER BY `date` ASC";//あるだけ抽出
        //$query[] = "ORDER BY `date` ASC LIMIT 0,1";//先頭の1行のみ抽出
        
        //$binds['status'] = $status;
        //$binds['date'] = $date;
        
        
        $query = implode(' ', $query);
        $rows_s = $this->fetchAll($query, $binds);
        
       
       //チェック済から数えて何個の未チェックがあるかを数える、配列のカウント関数
       $cnt_s = count($rows_s);
       
        // 直近の「チェック済」の日報が、今見てる日報から数えてちょうど1つ前にある場合はチェック完了ボタンを表示する
        if ($cnt_s == 1) {
            return true;
        }
		


        return false;
    }

    /**
     * 店舗IDから1か月分の日報を取得
     *
     */
    function getOneMonthByTenpoId($tenpo_id, $status = null, $obj_date = null)
    {
        if (is_null($obj_date)) {
            $obj_date = new DateTime;
        }

        $conditions = array(
            'is_deleted = ' => FLAG_OFF,
            'tenpo_id   = ' => $tenpo_id,
            'date BETWEEN ' => array(
                $obj_date->modify('first day of this months')->format('Y-m-d'),
                $obj_date->modify('last day of this months')->format('Y-m-d'),
            ),
        );

        if (!is_null($status)) {
            if (is_array($status)) {
                $conditions['status IN '] = $status;
            } else {
                $conditions['status = '] = $status;
            }
        }

        $rows = $this->findAll(array(
            'conditions' => $conditions,
            'order'      => array('date' => 'asc'),
        ));

        return $this->toCalendar($rows);
    }



    /**
     * 企業IDから1か月分の日報を取得（店舗IDが配列できてチェックを入れた店舗ごとに日報を取得）
     *
     */
    function getByCompanyId($company_id, $status = null, $date = null, $tenpo_id)
    {
    	
    	//**********************************************************************
    	//配列のカウント数を数える
		$count = count($tenpo_id);

        //配列時
        if(is_array($tenpo_id)){
        	
        	$i=0;
        	//店舗IDが配列の場合はforeach文で回してセレクト文
        	foreach($tenpo_id as $value){
        		//$valueに店舗IDが入る
        		if($sql_tenpo_id){
        			$tenpo_id = $value;
        			$sql_tenpo_id .= " OR `tenpo_id` = :tenpo_id_".$i."";
        			
        			//tenpo_idのカラム名を変える
	                $bind_tenpo = "tenpo_id_".$i."";

	                $binds_a[$bind_tenpo] = $tenpo_id;
        		
        		}else{
        			$tenpo_id = $value;
        			$sql_tenpo_id = " AND (`tenpo_id` = :tenpo_id_".$i."";
        			
        			$bind_tenpo = "tenpo_id_".$i."";
        			$binds_a[$bind_tenpo] = $tenpo_id;
        			
        		}
        		$i++;
        	}
        	
        	//最後に()をつける
        	$sql_tenpo_id .= ")";
    	
    	
    		//配列が1個だけのとき
			if($count==1){
				
				
				$binds = array(
		            'flag_off'   => FLAG_OFF,
		            'company_id' => $company_id,
		            'tenpo_id' => $tenpo_id,
		        );

		        $query = array();

		        $query[] = "SELECT * FROM `nippos`";
		        $query[] = "WHERE `is_deleted` = :flag_off";
		        $query[] = "AND `company_id` = :company_id";
		        $query[] = "AND `tenpo_id` = :tenpo_id";

		        if (!is_null($status)) {
		            if (is_array($status)) {
		                $n = 0;
		                $buf = array();

		                foreach ($status as $k => $v) {
		                    $binds['status_' . $n] = $v;
		                    $buf[] = "status = :status_" . $n;
		                    $n++;
		                }

		                $query[] = "AND (" . implode(" OR ", $buf) . ")";

		            } else {
		                $binds['status'] = $status;
		                $query[] = "AND status = :status";
		            }
		        }

		        if (!is_null($date)) {
		            if (is_array($date)) {
		                $n = 0;
		                $buf = array();

		                foreach ($date as $k => $v) {
		                    $binds['date_' . $n] = $v;
		                    $buf[] = "date = :date_" . $n;
		                    $n++;
		                }

		                $query[] = "AND (" . implode(" OR ", $buf) . ")";

		            } else {
		                $binds['date'] = $date;
		                $query[] = "AND date = :date";
		            }
		        }

		        $query[] = "ORDER BY `date` ASC";

		        $query = implode(' ', $query);
				
		
		
			//配列が2個以上
			}else{
				
				$binds = array(
		            'flag_off'   => FLAG_OFF,
		            'company_id' => $company_id,
		            //'tenpo_id' => $tenpo_id,
		        );

		        $query = array();

		        $query[] = "SELECT * FROM `nippos`";
		        $query[] = "WHERE `is_deleted` = :flag_off";
		        $query[] = "AND `company_id` = :company_id";
		        //$query[] = "AND `tenpo_id` = :tenpo_id";
		        $query[] = $sql_tenpo_id;
		        

		        if (!is_null($status)) {
		            if (is_array($status)) {
		                $n = 0;
		                $buf = array();

		                foreach ($status as $k => $v) {
		                    $binds['status_' . $n] = $v;
		                    $buf[] = "status = :status_" . $n;
		                    $n++;
		                }

		                $query[] = "AND (" . implode(" OR ", $buf) . ")";

		            } else {
		                $binds['status'] = $status;
		                $query[] = "AND status = :status";
		            }
		        }

		        if (!is_null($date)) {
		            if (is_array($date)) {
		                $n = 0;
		                $buf = array();

		                foreach ($date as $k => $v) {
		                    $binds['date_' . $n] = $v;
		                    $buf[] = "date = :date_" . $n;
		                    $n++;
		                }

		                $query[] = "AND (" . implode(" OR ", $buf) . ")";

		            } else {
		                $binds['date'] = $date;
		                $query[] = "AND date = :date";
		            }
		        }

		        $query[] = "ORDER BY `date` ASC";

		        $query = implode(' ', $query);
				
				$binds = array_merge($binds_a, $binds);
			
			
			}
    	
    	}//if(is_array($tenpo_id)){	
    	//**********************************************************************



        return $this->fetchAll($query, $binds);
    }

    /**
     * 企業IDから1か月分の日報を取得
     *
     */
/*
    function getByCompanyId($company_id, $status = null, $date = null)
    {
        $binds = array(
            'flag_off'   => FLAG_OFF,
            'company_id' => $company_id,
        );

        $query = array();

        $query[] = "SELECT * FROM `nippos`";
        $query[] = "WHERE `is_deleted` = :flag_off";
        $query[] = "AND `company_id` = :company_id";

        if (!is_null($status)) {
            if (is_array($status)) {
                $n = 0;
                $buf = array();

                foreach ($status as $k => $v) {
                    $binds['status_' . $n] = $v;
                    $buf[] = "status = :status_" . $n;
                    $n++;
                }

                $query[] = "AND (" . implode(" OR ", $buf) . ")";

            } else {
                $binds['status'] = $status;
                $query[] = "AND status = :status";
            }
        }

        if (!is_null($date)) {
            if (is_array($date)) {
                $n = 0;
                $buf = array();

                foreach ($date as $k => $v) {
                    $binds['date_' . $n] = $v;
                    $buf[] = "date = :date_" . $n;
                    $n++;
                }

                $query[] = "AND (" . implode(" OR ", $buf) . ")";

            } else {
                $binds['date'] = $date;
                $query[] = "AND date = :date";
            }
        }

        $query[] = "ORDER BY `date` ASC";

        $query = implode(' ', $query);

        return $this->fetchAll($query, $binds);
    }
*/
    /**
     * 企業IDから1か月分の日報ステータスチェックのためのデータを取得
     *
     */
    //function getOneMonthByCompanyIdForStatusCheck($company_id, $obj_date = null)
    function getOneMonthByCompanyIdForStatusCheck($company_id, $obj_date = null,$tenpo_id)
    {
        if (is_null($obj_date)) {
            $obj_date = new DateTime;
        }

        $query = array();

        //配列のカウント数を数える
		$count = count($tenpo_id);

        //配列時
        if(is_array($tenpo_id)){
        	
        	$i=0;
        	//店舗IDが配列の場合はforeach文で回してセレクト文
        	foreach($tenpo_id as $value){
        		//$valueに店舗IDが入る
        		if($sql_tenpo_id){
        			$tenpo_id = $value;
        			$sql_tenpo_id .= " OR `tenpo_id` = :tenpo_id_".$i."";
        			
        			//tenpo_idのカラム名を変える
	                $bind_tenpo = "tenpo_id_".$i."";

	                $binds_a[$bind_tenpo] = $tenpo_id;
        		
        		}else{
        			$tenpo_id = $value;
        			$sql_tenpo_id = " AND (`tenpo_id` = :tenpo_id_".$i."";
        			
        			$bind_tenpo = "tenpo_id_".$i."";
        			$binds_a[$bind_tenpo] = $tenpo_id;
        			
        		}
        		$i++;
        	}
        	
        	//最後に()をつける
        	$sql_tenpo_id .= ")";
        				
			//配列が1個だけのとき
			if($count==1){
			
				$query[] = "SELECT `date`";
		        $query[] = ", COUNT(*) AS cnt";
		        $query[] = ", SUM(CASE WHEN `status` = :status_finished THEN 1 ELSE 0 END) AS cnt_finished";    // ステータス「チェック済」のレコード数
		        $query[] = "FROM `nippos`";
		        $query[] = "WHERE `is_deleted` = :flag_off";
		        $query[] = "AND `company_id` = :company_id";
		        $query[] = "AND `tenpo_id` = :tenpo_id";
		        $query[] = "AND `date` BETWEEN :date_from AND :date_to";
		        $query[] = "GROUP BY `date`";
		        $query[] = "ORDER BY `date` ASC";
		        
		        $query = implode(' ', $query);
		        
		        $binds = array(
	              'flag_off'        => FLAG_OFF,
	              'company_id'      => $company_id,
	              'tenpo_id'        => $tenpo_id,
	              'date_from'       => $obj_date->modify('first day of this months')->format('Y-m-d'),
	              'date_to'         => $obj_date->modify('last day of this months')->format('Y-m-d'),
	              'status_finished' => NIPPO_STATUS_FINISHED,
	            );
			
				//デバッグ用
				//print $count;
				//print "<br />";
				//print_r($query);
			
			
			//配列が2個以上
			}else{
				$query[] = "SELECT `date`";
		        $query[] = ", COUNT(*) AS cnt";
		        $query[] = ", SUM(CASE WHEN `status` = :status_finished THEN 1 ELSE 0 END) AS cnt_finished";    // ステータス「チェック済」のレコード数
		        $query[] = "FROM `nippos`";
		        $query[] = "WHERE `is_deleted` = :flag_off";
		        $query[] = "AND `company_id` = :company_id";
		        //$query[] = "AND `tenpo_id` = :tenpo_id";
		        $query[] = $sql_tenpo_id;
		        
		        $query[] = "AND `date` BETWEEN :date_from AND :date_to";
		        $query[] = "GROUP BY `date`";
		        $query[] = "ORDER BY `date` ASC";
		        
		        $query = implode(' ', $query);
		        
		        $binds = array(
	              'flag_off'        => FLAG_OFF,
	              'company_id'      => $company_id,
	              //'tenpo_id'        => $tenpo_id,
	              //'tenpo_id_1'        => $tenpo_id,
	              //'tenpo_id_0'        => $tenpo_id,
	              'date_from'       => $obj_date->modify('first day of this months')->format('Y-m-d'),
	              'date_to'         => $obj_date->modify('last day of this months')->format('Y-m-d'),
	              'status_finished' => NIPPO_STATUS_FINISHED,
	            );
	            
	            $binds = array_merge($binds_a, $binds);
	            
	            
	           }


        }//if(is_array($tenpo_id)){	
        
        
        			
				//デバッグ用
                //print_r($query);//SQL文
/*
        $query[] = "SELECT `date`";
        $query[] = ", COUNT(*) AS cnt";
        $query[] = ", SUM(CASE WHEN `status` = :status_finished THEN 1 ELSE 0 END) AS cnt_finished";    // ステータス「チェック済」のレコード数
        $query[] = "FROM `nippos`";
        $query[] = "WHERE `is_deleted` = :flag_off";
        $query[] = "AND `company_id` = :company_id";
        $query[] = "AND `date` BETWEEN :date_from AND :date_to";
        $query[] = "GROUP BY `date`";
        $query[] = "ORDER BY `date` ASC";

        $query = implode(' ', $query);

        $binds = array(
            'flag_off'        => FLAG_OFF,
            'company_id'      => $company_id,
            'date_from'       => $obj_date->modify('first day of this months')->format('Y-m-d'),
            'date_to'         => $obj_date->modify('last day of this months')->format('Y-m-d'),
            'status_finished' => NIPPO_STATUS_FINISHED,
        );
*/
        
        






        $rows = $this->fetchAll($query, $binds);

        return $this->toCalendar($rows);
    }

    /**
     * 店舗の稼働フラグ変更時のステータス調整
     *
     */
    function adjustStatusAtTenpoOperateFlagChanging($tenpo_id, $is_operated)
    {
        $conditions = array(
            'tenpo_id = ' => $tenpo_id,
            'date     = ' => $this->_now->format('Y-m-d'),
            'status  IN ' => array(NIPPO_STATUS_NEUTRAL, NIPPO_STATUS_PROCESSING),
        );

        if ($row = $this->find(array('conditions' => $conditions))) {
            $row->updated = $this->_now->format('c');

            if ($is_operated) {
                // 稼働状況を「稼働」に更新された場合、日報のステータス →「店舗処理中」
                //$row->status = NIPPO_STATUS_PROCESSING;

            } else {
                // 稼働状況を「停止」に更新された場合、日報のステータス →「非稼働」
                $row->status = NIPPO_STATUS_NEUTRAL;
            }

            $this->update($row);
        }

        return;
    }

    /**
     * 日報をカレンダー表示用に成型
     *
     */
    function toCalendar($rows)
    {
        $ret = array();

        if (!$rows) return $ret;

        foreach ($rows as $row) {
            $ret[$row->date->format('Y-m-d')] = $row;
        }

        return $ret;
    }
}
