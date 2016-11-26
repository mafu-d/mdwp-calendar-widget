<div class="mdwp_calendar">
    <?php foreach ($dates as $index => $date):?>
        <?php if ($index === 0):?>
            <div class="mdwp_calendar_row">
        <?php elseif ($index % 7 === 0):?>
            </div>
            <div class="mdwp_calendar_row">
        <?php endif;?>
        <div class="mdwp_calendar_block"><span class="<?= $date > 0 ? 'mdwp_calendar_block_active' : '' ?>" title="<?= $index ?>"></span></div>
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
    margin: 0 2px;
    height: 20px;
}
</style>
