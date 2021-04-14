@php
    if (Auth::user()->uuid == 1) {
        return redirect()->route('redirectone');
    }
@endphp

