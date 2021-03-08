<div class="container">
<div class="row col-12 mt-5">
    <h1 class="col-4">Edition</h1>

    <form action="" class="col-8">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="mytextarea" rows="3"></textarea>
        </div>
    </form>
</div>
</div>


<!-- https://blog.petehouston.com/remove-tinymce-warning-notification-on-cloud-api-key/ -->
<script src="assets/js/tinymce/js/tinymce/tinymce.min.js"></script>

<script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>