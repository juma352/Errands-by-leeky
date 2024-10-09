<label class="mb-2 block text-sm font-medium text-slate-900"
 for="{{$for}}">
@if ($required)
{{$slot}}
<span>*</span>  
@endif

</label>