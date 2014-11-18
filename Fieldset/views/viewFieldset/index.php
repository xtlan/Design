<?php foreach ($this->fields as $field) :?>
    <div class="viewFieldSet__content__row">
        <div class="viewFieldSet__content__label">
            <p><?=$field->getLabel()?></p>
        </div>
        <div class="viewFieldSet__content__desc">
            <p><?=$field->getValue()?></p>
        </div>
    </div>
<?php endforeach;?>
