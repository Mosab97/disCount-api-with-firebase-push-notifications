@if (session('success'))

    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 3000,
            killer: true
        }).show();
    </script>

@elseif(session('error'))

    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: "{{ session('error') }}",
            timeout: 3000,
            killer: true
        }).show();
    </script>
@elseif(isset($errors))
    @if($errors->has('subscription_email'))
        <script>
            new Noty({
                type: 'error',
                layout: '{{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'bottomRight' : 'bottomLeft' }}',
                text: " {{ $errors->first('subscription_email') }}",
                timeout: 3000,
                killer: true
            }).show();
        </script>

    @elseif($errors->has('comment') || $errors->has('star'))
        <script>

            var err_count = "{{ $errors->count() }}",
                text;
            if (err_count >= 2) {
                text = "{{ $errors->first('comment') }}" + "</br>" + "{{ $errors->first('star') }}";
            } else {
                text = "{{ $errors->has('comment') ? $errors->first('comment') : $errors->first('star') }}";
            }

            new Noty({
                type: 'error',
                layout: '{{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'bottomRight' : 'bottomLeft' }}',
                text: text,
                timeout: 3000,
                killer: true
            }).show();
        </script>
    @endif
@endif
