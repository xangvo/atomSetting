<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p style="float:right; display: none;" class="fa fa-chevron-circle-up" data-dclass="panel-body" data-show="1"></p>
                クーポン情報を入力してください。
            </div>
            <div class="panel-body" style="display: none;">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('saveAddCoupon')}}" id="form_submitCoupon" method="post" enctype="multipart/form-data">
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.category')}}</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <select name="coupon_class" id="coupon_class"  class="form-control" style="float:left;">
                                                <?php
                                                echo '<option value=""</option>';
                                                foreach($coupon_class as $key => $cate)
                                                {
                                                    $selected = (isset($coupon->coupon_class) && $coupon->coupon_class == $key) ? 'selected' : '';
                                                    echo '<option value="'.$key.'"'.$selected.'>' .trans('lang.'.$cate). '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_coupon_class" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group" id="row_used_point" <?=(isset($coupon->coupon_class) && $coupon->coupon_class == 1) ? '' : 'style="display:none"'?>>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.point')}}</label>
                                        </div>
                                        <div class="col-sm-8">
                                             <input name="used_point" id="used_point" class="form-control" type="number" min="1" value="<?= isset($coupon->used_point) ? $coupon->used_point : ''?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_used_point" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="col-sm-2">
                                                <label>{{trans('lang.name')}}</label>
                                            </div>
                                            <div class="col-sm-8">
                                                 <input name="coupon_name" id="coupon_name" class="form-control" type="text"  value="<?= isset($coupon->coupon_name) ? $coupon->coupon_name : ''?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_coupon_name" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group" id="row_listexplain" <?=(isset($coupon->coupon_class) && $coupon->coupon_class == 0) ? '' : 'style="display:none"'?>>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.listexplain')}}</label>
                                        </div>
                                        <div class="col-sm-10">
                                             <textarea name="list_description" id="list_description"  class="form-control"><?= isset($coupon->list_description) ? $coupon->list_description : ''?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_list_description" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.detailexplain')}}</label>
                                        </div>
                                        <div class="col-sm-10">
                                             <textarea name="detail_description" id="detail_description"  class="form-control"><?= isset($coupon->detail_description) ? $coupon->detail_description : ''?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_detail_description" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                             <label>{{trans('lang.image')}}</label>
                                        </div>
                                        <div class="col-sm-8">
                                             <label class="btn btn-default" for="image">
                                            <input id="image" name="image" <?= !isset($coupon->coupon_name) ? '' : ''?> type="file"  accept="image/x-png" />
                                            </label>
                                            <?php
                                            if(isset($coupon->pic_id) && $coupon->pic_id != '')
                                            {
                                            ?>
                                            <br>
                                            <img width="70px" src="{{asset('images/'.$coupon->pic_id)}}"/>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_image" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                            <div class="col-sm-2">
                                                <label>{{trans('lang.imageafteruse')}}</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <label class="btn btn-default" for="image_deleted">
                                                    <input id="image_deleted" name="image_deleted" type="file" accept="image/x-png" />
                                                </label>
                                                <?php
                                                if(isset($coupon->used_pic_id) && $coupon->used_pic_id != '')
                                                {
                                                ?>
                                                <br>
                                                <img width="70px" src="{{asset('images/'.$coupon->used_pic_id)}}"/>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_image_deleted" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.methodsused')}}</label>
                                        </div>
                                        <div class="col-sm-6">
                                             <select name="used_method" id="used_method"  class="form-control deleteway">
                                                <?php
                                                echo '<option value=""</option>';
                                                foreach($clearingMethod as $key => $way)
                                                {
                                                    $selected = (isset($coupon->used_method) && $coupon->used_method == $key) ? 'selected' : '';
                                                    echo '<option value="'.$key.'"'.$selected.'>' .trans('lang.'.$way). '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_used_method" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group div_pin_code" <?= (isset($coupon->used_method) && $coupon->used_method == 1) ? '' : 'style="display:none;"'; ?>>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.pincode')}}</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>{{trans('lang.listpincode')}}</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select name="pincode" id="pincode" class="form-control">
                                                        <?php
                                                        echo '<option value=""></option>';
                                                        if(!empty($list_pin))
                                                        foreach($list_pin as $pin)
                                                        {
                                                            if($count_detail[$pin->pass_set_id]->count != 0)
                                                            {
                                                                $selected = (isset($coupon->pass_set_id) && $coupon->pass_set_id == $pin->pass_set_id) ? 'selected' : '';
                                                                echo '<option value="'.$pin->pass_set_id.'"'.$selected.'>' .$pin->pass_set_name. '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 checkValidate checkValidate_pincode" style="color: red; ">

                                </div>
                            </div>

                            <?php
                            if(!empty($list_code))
                            {
                                foreach($list_code as $key=> $code)
                                {
                                ?>
                                    <div class="row form-group div_pin_code count_<?php echo $key?>" <?= (isset($coupon->used_method) && $coupon->used_method == 1) ? '' : 'style="display:none;"'; ?>>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <label>{{trans('lang.selfimport')}}</label>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label>{{trans('lang.name')}}</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input name="selfimport_name[]" class="form-control"  type="text" value="<?= $code->pass_name?>">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label>{{trans('lang.code')}}</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input name="selfimport_code[]" class="form-control"  type="text" value="<?= $code->pass_num?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <img class="img_click" style="" src="{{asset('img/remove.png')}}" height="35px" onclick="$('#row_pin_del').val(<?= $key ?>); $('#modalDel_pin').modal('toggle');">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 checkValidate checkValidate_selfimport" style="color: red; ">

                                        </div>
                                    </div>
                                <?php
                                }
                            }
                            else
                            {
                            ?>
                                <div class="row form-group div_pin_code" <?= (isset($coupon->used_method) && $coupon->used_method == 1) ? '' : 'style="display:none;"'; ?>>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-2">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label>{{trans('lang.selfimport')}}</label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label>{{trans('lang.name')}}</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input name="selfimport_name[]" class="form-control"  type="text" value="">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label>{{trans('lang.code')}}</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input name="selfimport_code[]" class="form-control"  type="text" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 checkValidate checkValidate_selfimport" style="color: red; ">

                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="row form-group div_pin_code" id="after_form_pin" <?= (isset($coupon->used_method) && $coupon->used_method == 1) ? '' : 'style="display:none;"'; ?>>
                                <div class="col-sm-2">
                                    <img class="img_click click_add_form_pin_2" src="{{asset('img/plus.png')}}" height="35px">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.deliveryperiod')}}</label>
                                        </div>
                                        <div class="col-sm-8">
                                             <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>{{trans('lang.start')}}</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="input-group date datetimepicker" data-date-format="yyyy-mm-dd hh:ii:ss">
                                                                <input name="start" id="start" type="text"  class="form-control data-readonly" value="<?= isset($coupon->start_time) ? $coupon->start_time : ''?>">
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>{{trans('lang.end')}}</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="input-group date datetimepicker" data-date-format="yyyy-mm-dd hh:ii:ss">
                                                                <input name="end" id="end" type="text"  class="form-control data-readonly" value="<?= isset($coupon->end_time) ? $coupon->end_time : ''?>">
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_start checkValidate_end" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.usemaxable')}}</label>
                                        </div>
                                        <div class="col-sm-10">
                                             <input id="limit_flg" class="css-checkbox" type="checkbox" <?= (isset($coupon->limit_flg) && $coupon->limit_flg != '') ? 'checked' : ''?> name="limit_flg" value="1" >
                                        <label for="limit_flg" class="css-label" onclick="$('#div_usemax').toggle();"></label>
                                        {{trans('lang.noteusemax')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="color: red; ">
                                </div>
                            </div>

                            <div class="row form-group" id="div_usemax" <?= (isset($coupon->limit_flg) && $coupon->limit_flg != '') ? '' : 'style="display: none;"'?>>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">

                                        </div>
                                        <div class="col-sm-8">
                                             <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <label>{{trans('lang.times')}}</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input name="limit_num" id="limit_num" class="form-control"  type="number" min="1" value="<?= isset($coupon->limit_num) ? $coupon->limit_num : 1?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 checkValidate checkValidate_limit_num" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.reuseable')}}</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="reuse_flg" class="css-checkbox" type="checkbox" <?= (isset($coupon->reuse_flg) && $coupon->reuse_flg != 0) ? 'checked' : ''?> name="reuse_flg" value="1" >
                                            <label for="reuse_flg" class="css-label" style=""></label>
                                            {{trans('lang.notereuse')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate" style="color: red; ">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.noticeable')}}</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="button_flg" class="css-checkbox" type="checkbox" <?= (isset($coupon->notice_display) && $coupon->notice_display != 0) ? 'checked' : ''?> name="button_flg" value="1" >
                                            <label for="button_flg" class="css-label" style=""></label>
                                            {{trans('lang.notenotice')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate" style="color: red; ">

                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>{{trans('lang.status')}}</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <select name="status" id="status"  class="form-control">
                                                <?php
                                                echo '<option value=""</option>';
                                                foreach($status as $key => $sta)
                                                {
                                                    $selected = (isset($coupon->status) && $coupon->status == $key) ? 'selected' : '';
                                                    echo '<option value="'.$key.'"'.$selected.'>' .trans('lang.'.$sta). '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkValidate checkValidate_status" style="color: red; ">

                                </div>
                            </div>

                            <input type="hidden" name="id_update" id="id_update" value="<?php if (isset($coupon)) echo $coupon->coupon_id?>">
                            {!! csrf_field() !!}
                            <button type="button" class="btn btn-success submitCoupon">{{trans('lang.submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input id="linkCheckJapaness" type="hidden" value="{{route('checkValidateJapan')}}">

<input class="error_coupon_class" type="hidden" value="{{trans("lang.errorCouponClass")}}">
<input class="error_used_point" type="hidden" value="{{trans("lang.errorCouponPoint")}}">
<input class="error_coupon_name" type="hidden" value="{{trans("lang.errorCouponName")}}">
<input class="error_list_description" type="hidden" value="{{trans("lang.errorCouponListExplain")}}">
<input class="error_detail_description" type="hidden" value="{{trans("lang.errorCouponDetailExplain")}}">
<input class="error_image" type="hidden" value="{{trans("lang.errorCouponImage")}}">
<input class="error_used_method" type="hidden" value="{{trans("lang.errorCouponMethodsUse")}}">
<input class="error_pincode" type="hidden" value="{{trans("lang.errorCouponSetPinCode")}}">
<input class="error_coupon_class" type="hidden" value="{{trans("lang.errorCouponPinCode")}}">
<input class="error_start" type="hidden" value="{{trans("lang.errorCouponStart")}}">
<input class="error_end" type="hidden" value="{{trans("lang.errorCouponEnd")}}">
<input class="error_limit_num" type="hidden" value="{{trans("lang.errorCouponReuse")}}">
<input class="error_status" type="hidden" value="{{trans("lang.errorCouponStatus")}}">

<input class="errorLength_used_point" type="hidden" value="{{trans("lang.errorUsedpointDigitsBetween")}}">
<input class="errorLength_coupon_name" type="hidden" value="{{trans("lang.errorNameMax")}}">
<input class="errorLength_list_description" type="hidden" value="{{trans("lang.errorListDescriptionMax")}}">
<input class="errorLength_detail_description" type="hidden" value="{{trans("lang.errorDetailDescriptionMax")}}">
<input class="errorLength_limit_num" type="hidden" value="{{trans("lang.errorCouponStatus")}}">
<input class="errorLength_pincode" type="hidden" value="{{trans("lang.errorPasswordNameMax")}}">

<div class="modal fade" id="modalDel_pin" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('lang.confirm')}}</h4>
            </div>
            <div class="modal-body">
                <p>{{trans('lang.confirmdelete')}}</p>
            </div>
            <input type="hidden" id="row_pin_del" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="submit_del_pin" onclick="$('.count_' + $('#row_pin_del').val()).remove()">{{trans('lang.delete')}}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('lang.close')}}</button>
            </div>
        </div>
    </div>
</div>
