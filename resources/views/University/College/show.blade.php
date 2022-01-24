@extends('University.layouts.master')
@section('title', 'University-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <section class="users-edit">
      <div class="row">
         <div class="col-9">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"><b>College</b></h3>
               </div>
               <div class="card-content">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12 col-xl-4">
                           <table class="table table-borderless">
                              <tbody>
                                 <tr>
                                    <td>Name:</td>
                                    <td>{{$college->name}}</td>
                                 </tr>
                                 <tr>
                                    <td>Email:</td>
                                    <td class="users-view-latest-activity">{{$college->email}}</td>
                                 </tr>
                                 <tr>
                                    <td>Contact No.:</td>
                                    <td class="users-view-verified">{{$college->contact_no}}</td>
                                 </tr>
                                 <tr>
                                    <td>Address:</td>
                                    <td>{{$college->address}}</td>
                                 </tr>
                                 <tr>
                                    <td>Logo:</td>
                                    <td><img class="img" src="{{asset('storage/college/'.$college->logo)}}" width="80px" /></td>
                                 </tr>
                                 <tr>
                                    <td>Status:</td>
                                    <td><span class="badge bg-light-success users-view-status">Active</span></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endsection