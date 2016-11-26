<div class="mdwp_calendar">
    <?php $index = 0; foreach ($data as $date => $count):?>
        <?php if ($index === 0):?>
            <div class="mdwp_calendar_row">
        <?php elseif ($index % 7 === 0):?>
            </div>
            <div class="mdwp_calendar_row">
        <?php endif;?>
        <?php if ($count > 0): ?>
            <div class="mdwp_calendar_block"><a href="<?= get_day_link(date('Y', $date), date('m', $date), date('d', $date)) ?>" class="mdwp_calendar_block_active" title="<?= $date ?>"></a></div>
        <?php else: ?>
            <div class="mdwp_calendar_block"><span title="<?= $date ?>"></span></div>
        <?php endif; ?>
        <?php $index++; ?>
    <?php endforeach;?>
    </div>
</div>

<style>
.mdwp_calendar {
    display: table;
    width: 100%;
}
.mdwp_calendar_row {
    display: table-row;
}
.mdwp_calendar_label {
    display: table-cell;
    font-weight: bold;
    width: 1%;
    line-height: 20px;
    height: 20px;
    font-size: 0.8em;
    vertical-align: middle;
}
.mdwp_calendar_block {
    display: table-cell;
    padding: 0;
    height: 20px;
}
.mdwp_calendar_block span {
    display: block;
    background: #d0d0d0;
    margin: 2px;
    height: 20px;
}
.mdwp_calendar_block span.mdwp_calendar_block_active {
    background: #30d060;
}
</style>
