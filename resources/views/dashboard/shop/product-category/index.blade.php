@extends('dashboard.layouts.master')
@section('content')
<div class="page-content">
<div class="container-fluid">
   <!-- Page-Title -->
   <div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <div class="float-right">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item "> {{ __('dashboard-shop-product-category.leftCurrentPage1') }} </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('dashboard-shop-product-category.leftCurrentPage2') }}</a></li>
               </ol>
            </div>
         </div>
         <!--end page-title-box-->
      </div>
      <!--end col-->
   </div>
   <div class="text-right">
      <a href="#" data-toggle="modal" data-target="#AddProductCategoryModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded"><i
         class="fa fa-plus mr-2"></i>{{ __('dashboard-shop-product-category.addBtn') }}</a>
   </div>
   @include('dashboard.layouts.errors')
   <div class="modal fade bd-example-modal-xl" id="AddProductCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard-shop-product-category.addCategoryTitle') }}</h5>
               <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
               <form action="{{ route('product-category.store', ['continue' => 1, 'shop' => \Auth::user()->shop->english_name]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mb-0">
                     <div class="input-group mt-3">
                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                           class="fas fa-star required-star mr-1"></i>{{ __('dashboard-shop-product-category.addCategoryItem1') }} :</span></div>
                        <input type="text" class="form-control inputfield" value="{{ old('name') }}" name="name" placeholder="{{ __('dashboard-shop-product-category.addCategoryItem1ex') }}">
                     </div>
                     <div class="input-group mt-3">
                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-category.addCategoryItem2') }}:</span></div>
                        <select class="form-control inputfield" name="parent_id">
                           <option selected value="null">{{ __('dashboard-shop-product-category.addCategoryItem2Main') }}</option>
                           @foreach($categoires as $category)
                           @unless($category->parent()->get()->first() != null and $category->parent()->get()->first()->parent()->get()->first() != null and
                           $category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first() != null and
                           $category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->exists() and
                           !$category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->exists())
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endunless
                           @endforeach
                        </select>
                     </div>
                     <div class="input-group mt-3">
                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-category.addCategoryItem3') }} :</span></div>
                        <input type="text" class="form-control inputfield" value="{{ old('title') }}" name="description" placeholder="{{ __('dashboard-shop-product-category.addCategoryItem3ex') }}">
                     </div>
                     <div class="card mt-3">
                        <div class="card-body">
                           <h4 class="mt-0 header-title">{{ __('dashboard-shop-product-category.addCategoryItem4') }}</h4>
                           <input type="file" id="input-file-now" name="icon" class="dropify">
                        </div>
                     </div>
                  </div>
                  <!--end form-group-->
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger rounded" data-dismiss="modal">{{ __('dashboard-shop-product-category.addCategoryItem5') }}</button>
            <div class="group">
            <button type="submit" name="action" value="justSave" class="btn btn-primary rounded">{{ __('dashboard-shop-product-category.addCategoryItem6') }}</button>
            <button type="submit" name="action" value="saveAndContinue" class="btn btn-primary rounded">{{ __('dashboard-shop-product-category.addCategoryItem7') }} </button>
            </div>
            </div>
            </form>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body p-0 p-lg-2 p-md-2">
               <div id="accordion">
                @if($parentCategories->count() <= 0)
                  <div class="d-flex font-18 justify-content-center text-red">
                    دسته بندی وجود ندارد !!!!
                  </div>
                @endif
                  @foreach($parentCategories as $parentCategory)
                  <div class="card border">
                     <div class="card-header d-flex justify-content-between flex-wrap" id="heading{{ $parentCategory->id }}">
                        <h5 class="mb-0">
                           <button class="btn btn-link collapsed font-18" data-toggle="collapse" data-target="#collapse{{ $parentCategory->id }}" aria-expanded="false" aria-controls="collapse{{ $parentCategory->id }}"
                              style="color:#122272;">
                           {{ $parentCategory->name }}
                           </button>
                        </h5>
                        <div class="p-3">
                           <a href="{{ route('product-category.edit', $parentCategory->id) }}" id="editCat" title="ویرایش"><i class="far fa-edit text-info mr-1 button font-18"></i>
                           </a>
                           <a href="" id="removeCat" data-name="{{ $parentCategory->name }}" title="حذف" data-id="{{ $parentCategory->id }}"><i class="far fa-trash-alt text-danger font-18"></i></a>
                           <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$parentCategory->id, 'name' => $parentCategory->name]) }}" title="مشاهده محصولات دسته بندی"><i class="fa fa-eye text-success mr-1 button font-18"></i></a>
                           <a href="{{ route('feature.index', ['cat_id'=>$parentCategory->id]) }}"><i class="fa fa-tasks text-purple mr-1 button font-18" title="ویژگی ها"></i></a>
                        </div>
                     </div>
                     <div id="collapse{{ $parentCategory->id }}" class="collapse" aria-labelledby="heading{{ $parentCategory->id }}">
                        <div class="card-body p-0 p-lg-2 p-md-2">
                           @if($parentCategory->children()->exists())
                           @foreach ($parentCategory->children()->get() as $subCategory)
                           <div class="card border">
                              <div class="card-header d-flex  justify-content-between  flex-wrap" style="background-color:#dfe5f7" id="heading{{ $subCategory->id }}">
                                 <h5 class="mb-0">
                                    <button class="btn btn-link collapsed font-18" data-toggle="collapse" data-target="#collapse{{ $subCategory->id }}" aria-expanded="false" aria-controls="collapse{{ $subCategory->id }}"
                                       style="color:#122272;">
                                    {{ $subCategory->name }}
                                    </button>
                                 </h5>
                                 <div class="p-3">
                                    <a href="{{ route('product-category.edit', $subCategory->id) }}" id="editCat" title="ویرایش"><i class="far fa-edit text-info mr-1 button font-18"></i>
                                    </a>
                                    <a href="" id="removeCat" data-name="{{ $subCategory->name }}" title="حذف" data-id="{{ $subCategory->id }}"><i class="far fa-trash-alt text-danger font-18"></i></a>
                                    <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id, 'name' => $subCategory->name]) }}" title="مشاهده محصولات دسته بندی"><i class="fa fa-eye text-success mr-1 button font-18"></i>
                                    </a>
                                     <a href="{{ route('feature.index', ['cat_id'=>$subCategory->id]) }}"><i class="fa fa-tasks text-purple mr-1 button font-18" title="ویژگی ها"></i></a>
                                 </div>
                              </div>
                              <div id="collapse{{ $subCategory->id }}" class="collapse" aria-labelledby="heading{{ $subCategory->id }}">
                                 <div class="card-body p-0 p-lg-2 p-md-2">
                                    @if($subCategory->children()->exists())
                                    @foreach ($subCategory->children()->get() as $subSubCategory)
                                    <div class="card border">
                                       <div class="card-header d-flex  justify-content-between  flex-wrap" style="background-color:#c1cef5" id="headingTwo">
                                          <h5 class="mb-0">
                                             <button class="btn btn-link collapsed font-18" data-toggle="collapse" data-target="#collapse{{ $subSubCategory->id }}" aria-expanded="false"
                                                aria-controls="collapse{{ $subSubCategory->id }}" style="color:#122272;">
                                             {{ $subSubCategory->name }}
                                             </button>
                                          </h5>
                                          <div class="p-3">
                                             <a href="{{ route('product-category.edit', $subSubCategory->id) }}" id="editCat" title="ویرایش"><i
                                                class="far fa-edit text-info mr-1 button font-18"></i>
                                             </a>
                                             <a href="" title="حذف" id="removeCat" data-name="{{ $subSubCategory->name }}" data-id="{{ $subSubCategory->id }}"><i class="far fa-trash-alt text-danger font-18"></i></a>
                                             <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id, 'name' => $subSubCategory->name]) }}" title="مشاهده محصولات دسته بندی"><i class="fa fa-eye text-success mr-1 button font-18"></i>
                                             </a>
                                              <a href="{{ route('feature.index', ['cat_id'=>$subSubCategory->id]) }}"><i class="fa fa-tasks text-purple mr-1 button font-18" title="ویژگی ها"></i></a>
                                          </div>
                                       </div>
                                       <div id="collapse{{ $subSubCategory->id }}" class="collapse" aria-labelledby="heading{{ $subSubCategory->id }}">
                                          <div class="card-body p-0 p-lg-2 p-md-2">
                                             <div id="collapse{{ $subCategory->id }}" class="collapse" aria-labelledby="heading{{ $subCategory->id }}">
                                                <div class="card-body p-0 p-lg-2 p-md-2">
                                                   @if($subSubCategory->children()->exists())
                                                   @foreach ($subSubCategory->children()->get() as $subSubSubCategory)
                                                   <div class="card border">
                                                      <div class="card-header d-flex  justify-content-between  flex-wrap" style="background-color:#86A3F7" id="headingTwo">
                                                         <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed font-18" data-toggle="collapse" data-target="#collapse{{ $subSubSubCategory->id }}" aria-expanded="false"
                                                               aria-controls="collapse{{ $subSubSubCategory->id }}" style="color:#122272;">
                                                            {{ $subSubSubCategory->name }}
                                                            </button>
                                                         </h5>
                                                         <div class="p-3">
                                                            <a href="{{ route('product-category.edit', $subSubSubCategory->id) }}" id="editCat" title="ویرایش"><i
                                                               class="far fa-edit text-info mr-1 button font-18"></i>
                                                            </a>
                                                            <a href="" title="حذف" id="removeCat" data-name="{{ $subSubSubCategory->name }}" data-id="{{ $subSubSubCategory->id }}"><i
                                                               class="far fa-trash-alt text-danger font-18"></i></a>
                                                            <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id, 'name' => $subSubSubCategory->name]) }}" title="مشاهده محصولات دسته بندی"><i
                                                               class="fa fa-eye text-success mr-1 button font-18"></i>
                                                            </a>
                                                             <a href="{{ route('feature.index', ['cat_id'=>$subSubSubCategory->id]) }}"><i class="fa fa-tasks text-purple mr-1 button font-18" title="ویژگی ها"></i></a>
                                                         </div>
                                                      </div>
                                                      <div id="collapse{{ $subSubSubCategory->id }}" class="collapse" aria-labelledby="heading{{ $subSubSubCategory->id }}">
                                                         <div class="card-body p-0 p-lg-2 p-md-2">
                                                            <div id="collapse{{ $subSubSubCategory->id }}" class="collapse" aria-labelledby="heading{{ $subSubSubCategory->id }}">
                                                               <div class="card-body p-0 p-lg-2 p-md-2">
                                                                  @if($subSubSubCategory->children()->exists())
                                                                  @foreach ($subSubSubCategory->children()->get() as $subSubSubSubCategory)
                                                                  <div class="card border">
                                                                     <div class="card-header d-flex  justify-content-between  flex-wrap" style="background-color:#122272" id="headingTwo">
                                                                        <h5 class="mb-0">
                                                                           <button class="btn btn-link collapsed font-18" data-target="#collapse{{ $subSubSubSubCategory->id }}" aria-expanded="false"
                                                                              aria-controls="collapse{{ $subSubSubSubCategory->id }}" style="color:white;">
                                                                           {{ $subSubSubSubCategory->name }}
                                                                           </button>
                                                                        </h5>
                                                                        <div class="p-3">
                                                                           <a href="{{ route('product-category.edit', $subSubSubSubCategory->id) }}" id="editCat" title="ویرایش"><i
                                                                              class="far fa-edit text-info mr-1 button font-18"></i>
                                                                           </a>
                                                                           <a href="" title="حذف" id="removeCat" data-name="{{ $subSubSubSubCategory->name }}" data-id="{{ $subSubSubSubCategory->id }}"><i
                                                                              class="far fa-trash-alt text-danger font-18"></i></a>
                                                                           <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubSubCategory->id, 'name' => $subSubSubSubCategory->name]) }}" title="مشاهده محصولات این دسته بندی"><i
                                                                              class="fa fa-eye text-success mr-1 button font-18"></i>
                                                                           </a>
                                                                            <a href="{{ route('feature.index', ['cat_id'=>$subSubSubSubCategory->id]) }}"><i class="fa fa-tasks text-purple mr-1 button font-18" title="ویژگی ها"></i></a>
                                                                        </div>
                                                                     </div>
                                                                     <div id="collapse{{ $subSubSubSubCategory->id }}" class="collapse" aria-labelledby="heading{{ $subSubSubSubCategory->id }}">
                                                                     </div>
                                                                  </div>
                                                                  @endforeach
                                                                  @endif
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   @endforeach
                                                   @endif
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    @endforeach
                                    @endif
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
      <!-- end col -->
   </div>
</div>
<!-- Attachment Modal -->
@endsection
@section('pageScripts')
  <script src="{{ asset('/dashboard/assets/js/admin-product-category.js') }}"></script>
  @if(session()->has('flashModal'))
  <script>
     $('#AddProductCategoryModal').modal('show');
  </script>
  @endif
@stop
