<x-app-layout>
    <x-slot name="header">Quiz Güncelle</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.update',$quiz->id)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}">
                </div>
 
                <div class="form-group">
                    <label>Quiz Açıklama</label>
                    <textarea name="description" class="form-control"  rows="4"> {{ $quiz->description }}</textarea>
                </div>

                <div class="form-group">
                    <input id="isFinished" type="checkbox" @if($quiz->finished_at) checked @endif>
                    <label> Bitiş Tarihi Olcak mı?</label>

                </div>

                <div id="finishedInput" class="form-group" @if(!$quiz->finished_at) style="display:none" @endif>
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quiz Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 
    <script>  
            $('#isFinished').change(function(){
                if($('#isFinished').is(':checked')){
                    $('#finishedInput').show();
                }else{
                    $('#finishedInput').hide();
                }
                  }) </script>
    </x-slot>
</x-app-layout>
