@extends('layouts.app')

@section('title', 'Chat con ' . $other->nickname)

@section('content')
<div class="chat-wrapper row g-0">
    {{-- Todo tu HTML de chat aquí --}}
</div>
<div class="crt-aberr"></div>
<div class="crt-glow"></div>
@endsection

@push('scripts')
<script>
    const refreshBtn = document.getElementById("refreshBtn");

    const currentChat = document.getElementById("currentChat");
    if(currentChat){
      currentChat.addEventListener("click", function(e) {
        e.preventDefault();
        alert("ya estas aqui pero te perdono");
      });
    }

    refreshBtn.onclick = () => location.reload();
</script>
@endpush
