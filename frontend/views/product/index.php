<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\bootstrap4\LinkPager;

$this->title = '商品一覧'
?>
<h1>product/index</h1>
<?php if(isset($products) && count($products) > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Created by</th>
            <th>Created at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td scope="row"><?= Html::encode($product->id) ?></td>
                <td><?= Html::encode($product->name) ?></td>
                <td><?= Html::encode($product->quantity) ?></td>
                <td><?= Html::encode($product->created_by) ?></td>
                <td><?= Html::encode($product->created_at) ?></td>
                <td>
                    <?= Html::a('変更', ['/product/edit', 'id' => $product->id], ['class' => 'btn btn-primary']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php if(isset($pagination)): ?>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
<?php endif; ?>
