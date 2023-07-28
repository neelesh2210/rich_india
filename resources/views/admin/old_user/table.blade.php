<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>User Detail</th>
            <th>Paid Amount</th>
            <th>Unpaid Amount</th>
            <th>Associate</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($old_users as $key=>$old_user)
            <tr>
                @php
                    $session_user_ids = Session::get('user_ids');
                    if(!$session_user_ids){
                        $session_user_ids = [];
                    }
                @endphp
                <td> <input type="checkbox" value="{{$old_user->id}}" @if(in_array($old_user->id,$session_user_ids)) checked @endif></td>
                <td>
                    <b>Name: </b>{{$old_user->name}} <br>
                    <b>Email: </b>{{$old_user->email}} <br>
                    <b>Phone: </b>{{$old_user->phone}} <br>
                    <b>Referrer Code: </b>{{$old_user->referrer_code}} <br>
                    <b>Package: </b>{{$old_user->userDetail->plan->title}}
                </td>
                <td>{{$old_user->userDetail->old_paid_payout}}</td>
                <td>{{$old_user->userDetail->old_not_paid_payout}}</td>
                <td class="text-center">
                    @php
                        $associates = App\Models\User::where('referral_code',$old_user->referrer_code)->get();
                    @endphp
                    <a href="{{route('admin.associates')}}?search_key={{$old_user->referrer_code}}">{{$associates->count()}}</a>
                </td>
            </tr>
        @empty
            <tr class="footable-empty">
                <td colspan="11">
                    <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br>
                        <h2>Nothing Found</h2>
                    </center>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
<hr>
<div class="row">
    <div class="col-md-4">
        <p><b>Showing {{($old_users->currentpage()-1)*$old_users->perpage()+1}} to {{ $old_users->currentpage()*(($old_users->perpage() < $old_users->total()) ? $old_users->perpage(): $old_users->total())}} of {{ $old_users->total()}}</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $old_users->appends(['search_key'=>$search_key])->links() !!}
    </div>
</div>

<script>
    $(function () {
        $('.page-link').on('click', function (event) {
            event.preventDefault()
            var url = $(this).attr('href');
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $('#user_table').html(data)
                }
            });
        });
    });

    $(function () {
        $('input:checkbox').on('click', function (event) {
            var user_id = $(this).val()
            $.ajax({
                type: 'GET',
                url: '{{route("admin.set.session")}}?value='+user_id,
                success: function(data) {
                }
            });
        });
    });
</script>
