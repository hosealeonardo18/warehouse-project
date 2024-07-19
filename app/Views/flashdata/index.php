<?php if (session()->getFlashdata('alertError')) : ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach (session()->getFlashdata('alertError') as $error) : ?>
            <p><?= esc($error) ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>

<?php if (session()->getFlashdata('alertSuccess')) : ?>
    <div class="alert alert-success" role="alert">
        <?php
        $messages = session()->getFlashdata('alertSuccess');
        if (is_array($messages)) :
            foreach ($messages as $message) : ?>
                <p><?= esc($message) ?></p>
            <?php endforeach;
        else : ?>
            <p><?= esc($messages) ?></p>
        <?php endif; ?>
    </div>
<?php endif ?>

<?php if (session()->getFlashdata('alertInfo')) : ?>
    <div class="alert alert-warning" role="alert">
        <?php
        $messages = session()->getFlashdata('alertInfo');
        if (is_array($messages)) :
            foreach ($messages as $message) : ?>
                <p><?= esc($message) ?></p>
            <?php endforeach;
        else : ?>
            <p><?= esc($messages) ?></p>
        <?php endif; ?>
    </div>
<?php endif ?>