<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="form-group">

                <h4>{{ Form::label('name' , 'الأسم : ') }}</h4>
                {{ Form::text('name' , null , ['class' => 'form-control' , 'id' => 'name', 'style'=>'width: 80%; margin: auto;']) }}

            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">

                <h4>{{ Form::label('code' , 'الكود : ') }}</h4>
                {{ Form::number('code' , null , ['class' => 'form-control' , 'id' => 'code', 'style'=>'width: 80%; margin: auto;']) }}

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">

                <h4>{{ Form::label('email' , 'البريد الالكترونى : ') }}</h4>
                {{ Form::email('email' , null , ['class' => 'form-control' , 'id' => 'email', 'style'=>'width: 80%; margin: auto;']) }}

            </div>
        </div>
    </div>


    @if (!isset($selected_user))

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">

                    <h4>{{ Form::label('password' , 'كلمة المرور : ') }}</h4>
                    {{ Form::password('password' , ['class' => 'form-control' , 'id' => 'password', 'style'=>'width: 80%; margin: auto;']) }}

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">

                    <h4>{{ Form::label('password_confirmation' , 'تأكيد كلمة المرور : ') }}</h4>
                    {{ Form::password('password_confirmation' , ['class' => 'form-control' , 'id' => 'password_confirmation', 'style'=>'width: 80%; margin: auto;']) }}

                </div>
            </div>
        </div>

    @endif

    <div class="form-group" style="text-align: center">

        <h4>{{ Form::label('authority' , 'السلطة: ') }}</h4>

            {{ Form::radio('authority' , 'admin' , false) }} <strong style="font-size: 14px">Admin</strong> <br />
            {{ Form::radio('authority' , 'reader' , false) }} <strong style="font-size: 14px">Reader</strong> <br />

    </div>

    <div class="form-group" style="text-align: center">

        <h4>{{ Form::label('user_abilities' , 'الصلاحيات : ') }}</h4>

        @if(isset($selected_user))

        <span style="font-size: 14px">مصوغات التعيين</span>
        {{ Form::checkbox('user_abilities[]' , 'employee-images' , ($selected_user->canEdit('employee-images')) ? true : false ) }}
        <br />
         <span style="font-size: 14px">الايجارات</span>
        {{ Form::checkbox('user_abilities[]' , 'rentals' , ($selected_user->canEdit('rentals')) ? true : false ) }}
        <br />
        <span style="font-size: 14px">السيارات</span>
        {{ Form::checkbox('user_abilities[]' , 'cars' , ($selected_user->canEdit('cars')) ? true : false ) }}
        <br />
        <span style="font-size: 14px">الادارة</span>
        {{ Form::checkbox('user_abilities[]' , 'management' , ($selected_user->canEdit('management')) ? true : false ) }}
        <br />
        <span style="font-size: 14px">التأمينات</span>

        {{ Form::checkbox('user_abilities[]' , 'insurance' ,  ($selected_user->canEdit('insurance')) ? true : false ) }}
        <br />
        <span style="font-size: 14px">الأجازات</span>

        {{ Form::checkbox('user_abilities[]' , 'vacations' ,  (isset($user->user_abilities['vacations'])) ? true : false ) }}
        <br />

        @else

        <span style="font-size: 14px">مصوغات التعيين</span>
        {{ Form::checkbox('user_abilities[]' , 'employee-images') }}
        <br />
         <span style="font-size: 14px">الايجارات</span>
        {{ Form::checkbox('user_abilities[]' , 'rentals' ) }}
        <br />
        <span style="font-size: 14px">السيارات</span>
        {{ Form::checkbox('user_abilities[]' , 'cars' ) }}
        <br />
        <span style="font-size: 14px">الادارة</span>
        {{ Form::checkbox('user_abilities[]' , 'management' ) }}
        <br />
        <span style="font-size: 14px">التأمينات</span>

        {{ Form::checkbox('user_abilities[]' , 'insurance' ) }}
        <br />
        <span style="font-size: 14px">الأجازات</span>

        {{ Form::checkbox('user_abilities[]' , 'vacations' ) }}
        <br />

        @endif

    </div>


</div>

<script>

  var chkbox= document.querySelectorAll('input[type= "checkbox"]');
  var rad=document.querySelectorAll('input[type= "radio"]');

  function chkHandler(){
      for (let x=0 ; x<chkbox.length ; x++){
              for (let y=0 ; y<rad.length ; y++){
                  rad.item(y).checked = false;
              }
      }
  }
  function radioHandler(){
      for (let x=0 ; x<rad.length ; x++){
              for (let y=0 ; y<chkbox.length ; y++){
                  chkbox.item(y).checked = false;
              }
      }
  }
  for(let i =0 ; i<chkbox.length  ; i++){
      chkbox[i].onchange= function(){
          chkHandler();
      };
  }
  for(let i =0 ; i<rad.length  ; i++){
      rad[i].onchange= function(){
          radioHandler();
      };
  }


</script>

