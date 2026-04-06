<div class="users form content">
    <?= $this->Flash->render() ?>
    <h3><?= __('Iniciar Sesión - UPDS') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor, ingrese su correo y contraseña') ?></legend>
        <?= $this->Form->control('correo', [
            'required' => true, 
            'label' => __('Correo Electrónico')
        ]) ?>
        <?= $this->Form->control('password', [
            'required' => true, 
            'label' => __('Contraseña')
        ]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Ingresar')); ?>
    <?= $this->Form->end() ?>
</div>