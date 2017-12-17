@section('main_content')
 <div class="row">
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

<!-- Recent invoice with Statistics -->
<div class="row match-height">
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-deep-orange media-left media-middle">
                        <i class="icon-user1 font-large-2 white"></i>
                    </div>
                    <div class="p-2 media-body">
                        <h5 class="deep-orange">New Users</h5>
                        <h5 class="text-bold-400">1,22,356</h5>
                        <progress class="progress progress-sm progress-deep-orange mt-1 mb-0" value="45" max="100"></progress>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-cyan media-left media-middle">
                        <i class="icon-camera7 font-large-2 white"></i>
                    </div>
                    <div class="p-2 media-body">
                        <h5>New Products</h5>
                        <h5 class="text-bold-400">28</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 media-body text-xs-left">
                        <h5>New Users</h5>
                        <h5 class="text-bold-400">1,22,356</h5>
                    </div>
                    <div class="p-2 text-xs-center bg-teal media-right media-middle">
                        <i class="icon-user1 font-large-2 white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Invoices</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <p>Total paid invoices 240, unpaid 150. <span class="float-xs-right"><a href="#">Invoice Summary <i class="icon-arrow-right2"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Invoice#</th>
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Due</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-truncate"><a href="#">INV-001001</a></td>
                                <td class="text-truncate">Elizabeth W.</td>
                                <td class="text-truncate"><span class="tag tag-default tag-success">Paid</span></td>
                                <td class="text-truncate">10/05/2016</td>
                                <td class="text-truncate">$ 1200.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><a href="#">INV-001012</a></td>
                                <td class="text-truncate">Andrew D.</td>
                                <td class="text-truncate"><span class="tag tag-default tag-success">Paid</span></td>
                                <td class="text-truncate">20/07/2016</td>
                                <td class="text-truncate">$ 152.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><a href="#">INV-001401</a></td>
                                <td class="text-truncate">Megan S.</td>
                                <td class="text-truncate"><span class="tag tag-default tag-success">Paid</span></td>
                                <td class="text-truncate">16/11/2016</td>
                                <td class="text-truncate">$ 1450.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><a href="#">INV-01112</a></td>
                                <td class="text-truncate">Doris R.</td>
                                <td class="text-truncate"><span class="tag tag-default tag-warning">Overdue</span></td>
                                <td class="text-truncate">11/12/2016</td>
                                <td class="text-truncate">$ 5685.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><a href="#">INV-008101</a></td>
                                <td class="text-truncate">Walter R.</td>
                                <td class="text-truncate"><span class="tag tag-default tag-warning">Overdue</span></td>
                                <td class="text-truncate">18/05/2016</td>
                                <td class="text-truncate">$ 685.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection