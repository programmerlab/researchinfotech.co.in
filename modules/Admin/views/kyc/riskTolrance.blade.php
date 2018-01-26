@extends('packages::layouts.master')
@section('content') 
@include('packages::partials.main-header')
<!-- Left side column. contains the logo and sidebar -->
@include('packages::partials.main-sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    @include('packages::partials.breadcrumb')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit bordered">
                        <div class="panel-body ">
                            <div class="row">
                                <div class="box">
                                    <div class="box-header">
                                        <div class="table-toolbar">
                                        <div class="row">
                                            <form action="{{url('admin/riskTolrance')}}" method="get" id="filter_data">
                                             
                                            <div class="col-md-3">
                                                <input value="{{ (isset($_REQUEST['search']))?$_REQUEST['search']:''}}" placeholder="Search " type="text" name="search" id="search" class="form-control" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" value="Search" class="btn btn-primary form-control">
                                            </div>
                                           
                                        </form>
                                         <div class="col-md-2">
                                             <a href="{{ url('admin/riskTolrance') }}">   <input type="submit" value="Reset" class="btn btn-default form-control"> </a>
                                        </div>
                                       
                                        </div>
                                    </div>
                                        
                                        
                                    </div><!-- /.box-header -->
<hr>
                                    
                                    @if(Session::has('flash_alert_notice'))
                                         <div class="alert alert-success alert-dismissable" style="margin:10px">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                          <i class="icon fa fa-check"></i>  
                                         {{ Session::get('flash_alert_notice') }} 
                                         </div>
                                    @endif
                                      
                                     <div class="portlet-body">
                                    
         
        <table class="table table-striped table-hover table-bordered" id="contact">
            <thead>
                <tr>
                 <th>   Sno </th>  
                    <th> Name </th>
                    <th> Email </th> 
                    <th> Phone </th>   
                    <th> Mobile </th> 
                    <th>   </th>
                    <th>Created date</th>
                </tr>
            </thead>
            <tbody>
              @if(count($risktolrance))

            @foreach($risktolrance as $key => $result)
                <tr>
                 <th> {{++$key}} </th>
                  
                    <td> {{$result->full_name}} </td>
                     <td> {{$result->email}} </td>
                     <td> {{$result->phone}} </td>  
                      <td> {{$result->mobile}} </td>
                      <th>  <a href="{{url('admin/riskTolrance?export=pdf&id='.$result->id)}}">Download RiskTolrance</a>  </th>
                         <td>
                            {!! Carbon\Carbon::parse($result->created_at)->format('d-M-Y'); !!}
                        </td>
                        
                        <td> 
                            <a href="{{url('admin/risktolrance/delete/'.$result->id)}}">
                              <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                            </a>
                            
                        </td>
                   
                </tr>
               @endforeach
              @else
               <div class="alert-danger alert"> Record not found! </div>
              @endif   
            </tbody>
        </table>
       

         <div class="center" align="center">  {!! $risktolrance->appends(['search' => isset($_GET['search'])?$_GET['search']:''])->render() !!}</div>
    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div> 
        <!-- Main row --> 
    </section><!-- /.content -->
</div> 

@stop
