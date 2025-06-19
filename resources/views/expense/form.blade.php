@extends('temp-master')

@section('content')
    <!-- PANEL1 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> General data</h3>
                <div x-data="{ count: 0 }">
                    <button type='button' @click="count++">Add</button>
                    <span x-text="count"></span>
                </div> 
            </div>
            <div class="card-body">
                {{ Form::setData($data) }}
                {{ Form::text('ReffNo', 'Expense #',['placeholder'=>'ID','readonly'=>true]) }}
                {{ Form::text('JRdate', 'Date') }}
                {{ Form::text('Receiver', 'Receiver') }}
                {{ Form::combo('ExpCategory_id', 'Expense Category', $mCat) }}
                <!-- {{ Form::combo('Salesman', 'Salesman') }} -->
                {{ Form::text('JRdesc', 'Description') }}
                {{ Form::text('Amount', 'Amount') }}
                <!-- {{ Form::checkbox('Active', 'Active Customer') }} -->
            </div>
        </div><!-- end card-->
    </div>

    
@stop

@section('js')
    <script>
        
    </script>
@stop






