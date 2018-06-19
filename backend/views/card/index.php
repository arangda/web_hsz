<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
$this->title = '生成预约卡';
$this->params['breadcrumbs'][] = ['label' => '预约卡', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-create">


    <div class="card-form">
        <form>
        <ul>
            <li><label>姓名</label><input name="d_one" id="d_one" type="text"/></li>
            <li class="ttwo clearfix"><label>就诊日期</label><?php echo DatePicker::widget([
                    'id'=>'d_two',
                    'name' => 'd_two',
                    'options' => ['placeholder' => '...'],
                    //value值更新的时候需要加上
                    'value' => date('Y-m-d'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'startDate'=>date('Y-m-d'),
                    ]
                ]); ?></li>
            <li><label>预约号码</label><input name="d_three" id="d_three" type="text"/></li>
            <li class="tfour clearfix"><label>就诊科室</label>
                <select name="d_four" id="d_four">
                    <option value ="妇科">妇科</option>
                    <option value ="男科">男科</option>
                </select>
            </li>
            <li><label>性别</label>
                <input type="radio" name="d_five" class="d_five" value="女" checked="checked">女
                <input type="radio" name="d_five" class="d_five" value="男">男
            </li>
            <li><label>年龄</label><input name="d_six" id="d_six" type="text"/></li>
            <li><label>联系方式</label><input name="d_seven" id="d_seven" type="text"/></li>
            <li><label>主诉</label><textarea name="d_eight" id="d_eight" ></textarea></li>
            <li><input name="_csrf-backend" type="hidden" id="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>"/></li>
            <li><input type="button" id="create" class="btn btn-success" value="点击生成"/></li>
        </ul>
        </form>
    </div>
    <div class="card-img img-thumbnail" id="mimg">
        <img src="/images/new_pc_card.png"/>
    </div>
</div>


<?php $this->beginBlock('scyy')?>
    var url = ['create'];

    $("#create").on('click',function () {
        var d_one = $("#d_one").val();
        var d_two = $("#d_two").val();
        var d_three = $("#d_three").val();
        var d_four = $("#d_four").val();
        var d_five = $("input[name='d_five']:checked").val();
        var d_six = $("#d_six").val();
        var d_seven = $("#d_seven").val();
        var d_eight = $("#d_eight").val();
        $.ajax({
            url:url,
            type:'post',
            data:{done:d_one,dtwo:d_two,dthree:d_three,dfour:d_four,dfive:d_five,dsix:d_six,dseven:d_seven,deight:d_eight},
            success:function (data) {
                console.log(data);
                //if(data=="suc") {
                var random = Math.floor(Math.random()*(9999)+1);
                   $("#mimg img").attr("src","/images/card2.png?p="+random);
                //}
            }
        })
    })


<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['scyy']);
