@extends('admin.dashboard')
@section('mainpage')
<div id="page-wrapper" style="margin: 0 0 0 0em;">
   <div class="main-page">
      <div class="panel-body widget-shadow" style="background: #EE5744!important;">
         <h4 style="color: #fff !important;">Edit Profile Of User {{$edituser->username}}</h4>
      </div>
      <div class="panel-body widget-shadow">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                        <h2 class="panel-title">Account Information</h2>
                        <span class="pull-right clickable"><i class="fa fa-arrow-up"></i></span>
                     </div>
                     <div class="panel-body">
                        <div class="col-md-4">
                           <img class="img-responsive" src="{{$edituser->profile->profileimage}}" alt="">
                           <ul class="list-group">
                              <li class="list-group-item text-center active">Description</li>
                              <li class="list-group-item">
                                 <p style="text-align: justify">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer
                                 </p>
                              </li>
                           </ul>
                        </div>
                        <div class="col-md-8">
                           <div class="account_basic_inforamtion">
                              <table class="table table-responsive">
                                 <tbody>
                                    <tr>
                                       <th>Full Name</th>
                                       <td>{{$edituser->firstname}} {{$edituser->lastname}}</td>
                                    </tr>
                                    <tr>
                                       <th>Email</th>
                                       <td>{{$edituser->email}}</td>
                                    </tr>
                                    <tr>
                                       <th>Phone Number</th>
                                       <td>{{$edituser->phonenumber}}</td>
                                    </tr>
                                    <tr>
                                       <th>User Role</th>
                                       <td>{{$edituser->role}}</td>
                                    </tr>
                                    <tr>
                                       <th>City</th>
                                       <td>{{$edituser->profile->city}}</td>
                                    </tr>
                                    <tr>
                                       <th>Country</th>
                                       <td>{{$edituser->profile->country}}</td>
                                    </tr>
                                    <tr>
                                       <th>Zip Code</th>
                                       <td>{{$edituser->profile->zipcode}}</td>
                                    </tr>
                                    <tr>
                                       <th>Street Address</th>
                                       <td>{{$edituser->profile->streetaddress}}</td>
                                    </tr>
                                    <tr>
                                       <th>Date Of Birth</th>
                                       <td>{{$edituser->profile->dateofbirth}}</td>
                                    </tr>
                                    <tr>
                                       <th>Balance</th>
                                       <td>{{$edituser->profile->balance}}</td>
                                    </tr>
                                    <tr>
                                       <th>Account Open Date</th>
                                       <td>{{$edituser->profile->created_at}}</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="panel panel-success">
                     <div class="panel-heading">
                        <h3 class="panel-title">Edit User Info</h3>
                        <span class="pull-right clickable"><i class="fa fa-arrow-up"></i></span>
                     </div>
                     <div class="panel-body">
                        <form role="form">
                           <div class="row">
                              <label class="col-xs-4" for="userrole">Change Role</label>
                              <div class="col-xs-8">
                                <div class="form-group">
                                    <select class="form-control" id="changerole">
                                      <option>user</option>
                                      <option>vendors</option>
                                      <option>admin</option>
                                    </select>
                                  </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xs-12">
                                 <button type="submit" class="btn btn-default">Change Role</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="panel panel-info">
                     <div class="panel-heading">
                        <h3 class="panel-title">Panel 3</h3>
                        <span class="pull-right clickable"><i class="fa fa-arrow-up"></i></span>
                     </div>
                     <div class="panel-body">Panel content</div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="panel panel-warning">
                     <div class="panel-heading">
                        <h3 class="panel-title">Panel 4</h3>
                        <span class="pull-right clickable"><i class="fa fa-arrow-up"></i></span>
                     </div>
                     <div class="panel-body">Panel content</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
   $(document).on('click', '.panel-heading span.clickable', function(e){
       var $this = $(this);
           if(!$this.hasClass('panel-collapsed')) {
           $this.parents('.panel').find('.panel-body').slideUp();
           $this.addClass('panel-collapsed');
           $this.find('i').removeClass('fa fa-arrow-up').addClass('fa fa-arrow-down');
       } else {
           $this.parents('.panel').find('.panel-body').slideDown();
           $this.removeClass('panel-collapsed');
           $this.find('i').removeClass('fa fa-arrow-down').addClass('fa fa-arrow-up');
       }
   
   });
   $('.panel-heading').click(function(){
       var $this = $(this);
       if(!$this.hasClass('panel-collapsed')) {
           $this.parents('.panel').find('.panel-body').slideUp();
           $this.addClass('panel-collapsed');
           $this.find('i').removeClass('fa fa-arrow-up').addClass('fa fa-arrow-down');
       } else {
           $this.parents('.panel').find('.panel-body').slideDown();
           $this.removeClass('panel-collapsed');
           $this.find('i').removeClass('fa fa-arrow-down').addClass('fa fa-arrow-up');
       }
   });
   
   
   
</script>
@endsection