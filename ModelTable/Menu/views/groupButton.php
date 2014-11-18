<button class="actionBtn actionDefaultBtn">
    Действия
    <ul class="action__list">
        <?php foreach($buttons as $button) {
            $button->render();
        }?>
    </ul>
</button>
