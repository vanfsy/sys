<table class="nutrient">
    <tr>
        {foreach name='nutrient' from=$SET.NUTRIENT key='key' item='val'}
            <th>{$SET.NUTRIENT_NAME.$key|escape}</th><td>{$_values.$key|escape} {$SET.NUTRIENT_UNIT.$key|escape}</td>
            {if $smarty.foreach.nutrient.iteration % 2 == 0}</tr><tr>{/if}
        {/foreach}
    </tr>
</table>
