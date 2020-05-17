{capture name='css'}
<style type="text/css">
    /*<![CDATA[*/{literal}
    {/literal}/*]]>*/
</style>
{/capture}
{include file='admin/common/header.tpl' _title=$this_label _css=$smarty.capture.css}
<div id="contents">
    <div class="paragraph">{$this_label|escape}</div>
    <div class="btn-wrap-sub">
        <button type="button" class="btn btn-default btn-sm" onclick="linkTo('/admin/company/detail/{$params.id|escape}');">企業情報に戻る</button>
    </div>
    <form id="import" class="form-horizontal" method="post" action="">
        <input type="hidden" name="company_id" value="{$_company->id|escape}">
        <div class="form-group">
            <label class="col-sm-3 control-label" for="id">ID</label>
            <div class="col-sm-9">
                <div class="uneditable">{$params.id|string_format:'%05d'}</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">企業名</label>
            <div class="col-sm-9">
                <div class="uneditable">{$params.name|escape}</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="settlement_month">決算月</label>
            <div class="col-sm-9">
                <div class="uneditable">{$params.settlement_month|escape} 月</div>
            </div>
        </div>
        <div class="btn-wrap">
            <label for="importBtn" class="btn btn-default btn-suitable">インポート<input type="file" id="importBtn" name="import_file" accept=".zip" style="display:none;"></label>
        </div>
    </form>
    <br>
    <br>
    <br>
    <form id="export" class="form-horizontal" method="post" action="./export.php">
        <div class="form-group">
            <label class="col-sm-3 control-label" for="id">エクスポートする会計年度</label>
            <div class="col-sm-9{if isset($errors.nodata)} has-error{/if}">
                <div class="checkbox">{html_checkboxes name='settlement_period' options=$set_settlement_period}</div>
                {if isset($errors.nodata)}<p class="help-block"><small class="color-red">{$errors.nodata|escape}</small></p>{/if}
            </div>
        </div>
        <div class="btn-wrap">
            <button type="button" class="btn btn-default btn-suitable" name="export">エクスポート</button>
        </div>
    </form>
</div>
{capture name='js'}
<script type="text/javascript">
    /*<![CDATA[*/{literal}
        $(document).ready(function() {
            var tag = '<input type="file" id="importBtn" name="import_file" accept=".zip" style="display:none;">';

            // インポートファイル選択時
            $('label').on('change', 'input[type="file"]', function() {
                if (!$(this).prop('files').length) {
                    return false;
                }

                lock();

                var $me    = $(this);
                var text   = $me.parent().text();
                var file   = $me.prop('files')[0];
                var reader = new FileReader();

                reader.onloadend = function(event) {
                    $.ajax({
                        timeout:  60000,
                        async:    false,
                        cache:    true,
                        type:     'post',
                        url:      '/api/nippo/import.php',
                        dataType: 'text',
                        data: {
                            data:       event.target.result,
                            name:       file.name,
                            type:       file.type,
                            company_id: $('[name="company_id"]').val(),
                        },
                        beforeSend: function() {
                            if (file.type !== 'application/x-compress'
                             && file.type !== 'application/x-lha'
                             && file.type !== 'application/x-lha-compressed'
                             && file.type !== 'application/x-lk-rlestream'
                             && file.type !== 'application/x-zip-compressed'
                             && file.type !== 'application/zip'
                             && file.type !== 'multipart/x-zip'
                            ) {
                                alert('サポートされていない形式のファイルです。\nzipファイル形式のファイルを選択してください。');
                                return false;
                            }

                            if (!confirmTo('データをインポートします。よろしいですか？')) {
                                return false;
                            }
                        },
                        success: function(response) {
                            if (response == '0') {
                                alert('インポート処理中にエラーが発生しました。');
                                return false;
                            }

                            if (response == '99') {
                                alert('不正なファイルを検出したため、処理を中断しました。');
                                return false;
                            }

                            alert('インポートが完了しました。');
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert('インポートに失敗しました。');
                        }
                    });

                    $me.replaceWith(tag);
                };

                reader.readAsDataURL(file);

                unlock();
            });

            // エクスポートボタン押下時
            $('button[name="export"]').on('click', function() {
                if (!$('input[name^="settlement_period"]').is(':checked')) {
                    alert('会計年度が選択されていません。');
                    return false;
                }

                if (!confirmTo('選択した会計年度の画像データをエクスポートします。\nよろしいですか？')) {
                    return false;
                }

                lock();

                $('form#export').submit();

                unlock();
            });
        });
    {/literal}/*]]>*/
</script>
{/capture}
{include file='admin/common/footer.tpl' _js=$smarty.capture.js}
