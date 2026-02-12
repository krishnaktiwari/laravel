{{-- JSON-LD Schema --}}
@if(!empty($seo['schema']))
    <script type="application/ld+json">
                {!! json_encode($seo['schema'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>
@endif


@if(!empty($seo['additional_schema']))
    @foreach($seo['additional_schema'] as $schema)
        <script type="application/ld+json">
                    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
                </script>
    @endforeach
@endif

