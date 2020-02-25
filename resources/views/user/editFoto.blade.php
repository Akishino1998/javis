@extends('user.layouts.master')
@section('konten')
<style>
.imagePreview {
    margin: 20px;
    width: 15vw;
    height: 15vw;;
    background-position: center center;
  background:url({{ asset('foto-profile') }}/{{ $data->foto }});
  /* background-color:#fff; */
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
}
.btn-primary 
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.btn-success 
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
</style>
    <br><br>
    <div class="row">
        <div class="col-sm-3 mb-4 imgUp">
            <div class="card card-small mb-4 pt-3">
                <form action="/edit-foto" method="post" enctype="multipart/form-data">
                  <input type="text" name="id_user_biodata" value="{{ $data->id_user_biodata }}" hidden>
                  <div class="imagePreview"></div>
                  <label class="btn btn-primary" style="margin:8px">
                        Pilih Foto<input type="file" name="foto" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                    <label class="btn btn-success" style="margin:8px">
                        Unggah<input type="submit" class="uploadFile img" value="Upload Photo" style="margin-top:-10px;width: 0px;height: 0px;overflow: hidden; "hidden>
                    </label>
                    @csrf
                </form>
            </div>
        </div>
    </div>
      
      
@endsection
@section('jquery')
    <script>
      $(document).ready( function () {
        $(".imgAdd").click(function(){
            $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
        });
        $(document).on("click", "i.del" , function() {
            $(this).parent().remove();
        });
        $(function() {
            $(document).on("change",".uploadFile", function()
            {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
        
                    reader.onloadend = function(){ // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                    }
                }
              
            });
        });
    } );
    </script>
@endsection