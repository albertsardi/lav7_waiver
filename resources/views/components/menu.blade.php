@php
  dump('menu');
  $menu = [[
      'link' => 'reportall',
      'title' => 'reports',
      'icon' => 'fa-area-chart',
    ],
    [
      'link' => 'dashboard',
      'title' => 'Dashboard',
      'icon' => 'fa-bars',
    ],
    [
      'link'=>'bank',
      'title' => 'Cash & Banks',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'purchase',
      'title' => 'Purchases',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'sales',
      'title' => 'Sales',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'manufacture',
      'title' => 'Manufacture',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'expenses',
      'title' => 'Expenses',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'payments',
      'title' => 'Payment123',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'datalist/customers',
      'title' => 'Customers',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'datalist/suppliers',
      'title' => 'Suppliers',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'datalist/products',
      'title' => 'Products',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'datalist/coa',
      'title' => 'Chart of Accounts',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'setting',
      'title' => 'Setting',
      'icon' => 'fa-file-text-o',
    ],
    [
      'link'=>'logout',
      'title' => 'Log out',
      'icon' => 'fa-file-text-o',
    ],

  ];
  $submenu = [];
  $submenu['purchase'] = [
          [
            'link' => 'translist/PI',
            'title'=> 'Purchase Invoices',
          ],
          [
            'link' => 'translist/AP',
            'title'=> 'Pay Bills',
          ],
        ];
  $submenu['sales'] = [
          [
            'link' => 'translist/DO',
            'title'=> 'Delivery Order',
          ],
          [
            'link' => 'translist/SI',
            'title'=> 'Sales Invoices',
          ],
          [
            'link' => 'translist/AR',
            'title'=> 'Receive Payments',
          ],
        ];
  $submenu['sales'] = [
          [
            'link' => 'translist/DO',
            'title'=> 'Delivery Order',
          ],
          [
            'link' => 'translist/SI',
            'title'=> 'Sales Invoice',
          ],
          [
            'link' => 'translist/AR',
            'title'=> 'Receive Payments',
          ],
        ];
  $submenu['manufacture'] = [
          [
            'link' => 'translist/DO',
            'title'=> 'BIll Of Material',
          ],
          [
            'link' => 'translist/SI',
            'title'=> 'work Order',
          ],
          [
            'link' => 'translist/AR',
            'title'=> 'Material Release',
          ],
          [
            'link' => 'translist/AR',
            'title'=> 'Production Result',
          ],
        ];
@endphp
<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu" class="mt-5">

            <ul>


            @foreach($menu as $m)
            @php
              $link = $m['link'];
            @endphp
              
            <li class='submenu'>
              
              @if(!isset($submenu[$link]))
              
              <li class='submenu'> <a href='{{ url($link??'') }}' ><i class='fa fa-fw {{ $m['icon'] }}'></i><span> {{ $m['title']??'' }}</span></a></li> 
              @else
              <a href='#' ><i class='fa fa-fw fa-th'></i> <span>{{ $m['title']??'' }}</span> <span class='menu-arrow'></span></a>              
              <ul class='list-unstyled'>
                @foreach($submenu[$link] as $s)
                  <li><a href='{{url('/'.$s['link']??'')}}' > {{ $s['title']??'' }}</a></li>
                @endforeach
              </ul>
              @endif
            </li>  
            @endforeach









            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>

