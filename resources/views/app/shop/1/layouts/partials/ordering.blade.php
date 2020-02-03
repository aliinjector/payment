<div class="row d-flex mr-2">
    <h6 class="iranyekan text-dark">{{ __('app-shop-1-category.moratabSaziBaraasaase') }} :</h6>
    <div class="btn-group btn-group-toggle mb-4 flex-wrap d-inline" data-toggle="buttons">
        <label id="available-order-1" for="available-order-1"
          class="btn btn-outline-orange  @if(request()->sortBy['field'] == '' or request()->sortBy['field'] == 'created_at')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
          style="cursor:pointer">
            <input type="radio" class="available-order-1" id="available-order-1" name="sortBy[field]" value="created_at" @if(request()->sortBy['field'] == '' or request()->sortBy['field'] == 'created_at') checked="" @endif>
              {{ __('app-shop-1-category.jadidTarinha') }}
                <input type="radio" class="available-order-1" name="sortBy[orderBy]" value="desc" checked="">
        </label>
        <label id="available-order-2" for="available-order-2"
          class="btn btn-outline-orange @if(request()->sortBy['field'] == 'price'  and request()->sortBy['orderBy'] == 'asc')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
          style="cursor:pointer">
            <input type="radio" class="available-order-2" id="available-order-2" name="sortBy[field]" value="price" @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'asc') checked="" @endif>
              {{ __('app-shop-1-category.arzaanTarinha') }}
                <input type="radio" class="available-order-2" name="sortBy[orderBy]" value="asc">
        </label>
        <label id="available-order-3" for="available-order-3"
          class="btn btn-outline-orange  @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'desc')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
          style="cursor:pointer">
            <input type="radio" class="available-order-3" id="available-order-3" name="sortBy[field]" value="price" @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'desc') checked="" @endif>
              {{ __('app-shop-1-category.geraanTarinha') }}
                <input type="radio" class="available-order-3" name="sortBy[orderBy]" value="desc">
        </label>
        <label id="available-order-4" for="available-order-4" class="btn btn-outline-orange @if(request()->sortBy['field'] == 'buyCount')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
          style="cursor:pointer">
            <input type="radio" class="available-order-4" id="available-order-4" name="sortBy[field]" value="buyCount" @if(request()->sortBy['field'] == 'buyCount') checked="" @endif> {{ __('app-shop-1-category.porFrooshTarinha') }}
                <input type="radio" class="available-order-4" name="sortBy[orderBy]" value="desc">
        </label>
    </div>
</div>
