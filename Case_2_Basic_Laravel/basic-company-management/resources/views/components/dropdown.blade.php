<select class="select2 form-control" name="{{ $name }}" id="{{ $name }}" data-select2-id="select2-data-{{ $name }}" tabindex="-1" aria-hidden="true" aria-required="true" {{ $attributes }}>
    @if(!$attributes['multiple'])
        <option value="" @if(empty($selected)) selected @endif></option>
    @endif
    @foreach($options as $key => $option)
        @if(is_array($selected))
            <option value="{{ $key }}" {{ (isset($selected) && in_array($key, $selected)) ? 'selected' : null }}>{{ $option }}</option>
        @else
            <option value="{{ $key }}" {{ (isset($selected) && $selected == $key) ? 'selected' : null }}>{{ $option }}</option>
        @endif
    @endforeach
</select>

@push('css')
<link href="{{ asset('/assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
<script src="{{ asset('/assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script>
    (function() {
        $("select.select2").select2({
        allowClear: false,
        placeholder: "{{ $placeholder ?? 'Pilih' }}",
        ajax: {
            url: '/get-companies',
            dataType: 'json',
            delay: 500,
            data: function(params) {
                return {
                    term: params.term || '',
                    page: params.page || 1
                }
            },
            cache: true
   }
});
})();
</script>
@endpush