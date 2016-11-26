<p>
    <label for="<?= $this->get_field_id( 'title' ); ?>">Title</label>
    <input class="widefat" id="<?= $this->get_field_id( 'title' ); ?>" name="<?= $this->get_field_name( 'title' ); ?>" type="text" value="<?= esc_attr( $title ); ?>" />
</p>
<p>
    <label for="<?= $this->get_field_id('mode');?>">Mode</label>
    <select class="widefat" id="<?= $this->get_field_id('mode') ?>" name="<?= $this->get_field_name('mode');?>">
        <option value="week" <?=esc_attr($mode)==='week'?'selected':''?>>Week</option>
        <option value="month" <?=esc_attr($mode)==='month'?'selected':''?>>Month</option>
        <option value="year" <?=esc_attr($mode)==='year'?'selected':''?>>Year</option>
    </select>
</p>
