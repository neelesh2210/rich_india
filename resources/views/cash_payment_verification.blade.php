<form action="{{route('cash.payment.verify',$id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="payment_image">
    <input type="text" name="payment_id">
    <button>Send</button>
</form>
