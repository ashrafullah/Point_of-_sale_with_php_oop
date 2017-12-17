@extends('Admin.master')
@section('main_content')

<div class="row blank-page">
    <div class="card">
         <div class="card-block">
            <ol>Dashboard / Inventory</ol>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="red">
                                <i class="icon-plus"></i></h3>
                            <span>
                            <a href="{{ route('sale.create') }}">
                                New Sell
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus red font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            @foreach ($sales as $sale)
                                <h3 class="blue">{{$sale->id}}</h3>
                            @endforeach
                            
                            <span>
                            <a href="{{ route('sale.index') }}">
                             Sell List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list blue font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="green">
                                <i class="icon-plus"></i></h3>
                            <span>
                            <a href="{{ route('purchase.create') }}">
                                New Purchase
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus green font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            @foreach ($purchases as $purchase)
                               <h3 class="orange">
                               {{$purchase->id}}
                                </h3>
                            @endforeach
                            <span>
                            <a href="{{ route('purchase.index') }}">
                                Purchase List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list orange font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="blue">
                                <i class="icon-plus"></i></h3>
                            <span>
                            <a href="{{ route('supplier.create') }}">
                                New Supplier
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus blue font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            @foreach ($suppliers as $supplier)
                               <h3 class="black">
                               {{$supplier->id}}
                                </h3>
                            @endforeach
                            
                            <span>
                            <a href="{{ route('supplier.index') }}">
                                Supplier List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list black font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">

                        <h3 class="yellow"><i class="icon-plus"></i></h3>
                            
                            <span>
                            <a href="{{ route('customer.create') }}">
                                New Customer
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus yellow font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            @foreach ($customers as $customer)
                        <h3 class="pink">{{$customer->id}}</h3>
                            @endforeach
                            <span>
                            <a href="{{ route('customer.index') }}">
                             Customer List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="brown ">
                                <i class="icon-plus"></i></h3>
                            <span>
                            <a href="{{ route('item.create') }}">
                             Add  Item
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-plus brown  font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            @foreach ($products as $product)
                            <h3 class="green  ">{{$product->id}}</h3>
                            @endforeach
                           
                            <span>
                            <a href="{{ route('item.index') }}">
                             Item List
                            </a></span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-list green font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
           

@endsection