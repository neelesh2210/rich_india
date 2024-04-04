<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>User Detail</th>
            <th>Sponsor Details</th>
            <th>Active Plan</th>
            <th>Total Earning</th>
            <th>Total Withdrawl</th>
            <th>Associate</th>
        </tr>
    </thead>
    <tbody>
        @php
            $session_user_ids = Session::get('leaderboard_user_ids');
            if(!$session_user_ids){
                $session_user_ids = [];
            }
        @endphp
        @forelse ($users as $key=>$user)
            <tr>
                <td>
                    {{-- {{ $key + 1 + ($users->currentPage() - 1) * $users->perPage() }} --}}
                    <input type="checkbox" value="{{$user->id}}" @if(in_array($user->id,$session_user_ids)) checked @endif>
                </td>
                <td>
                    <b>Name: </b>{{ $user->name }} <br>
                    <b>Email: </b>{{ $user->email }} <br>
                    <b>Phone: </b>{{ $user->phone }} <br>
                    <b>Referrer Code: </b>{{ $user->referrer_code }} <br>
                    <b>Date: </b>{{ $user->created_at->format('d-M-Y h:i A') }} <br>
                    <b>Added By: </b>
                    @if ($user->added_by == 'admin')
                        Manual
                    @elseif($user->added_by == 'self')
                        Website
                    @endif
                </td>
                <td>
                    <b>Name: </b>{{ optional($user->sponsorDetail)->name }} <br>
                    <b>Referrer Code: </b>{{ optional($user->sponsorDetail)->referrer_code }} <br>
                </td>
                <td>{{ $user->userDetail->plan->title }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.earning') }}?search_key={{ $user->email }}">
                        ₹ {{ $user->userDetail->total_commission }}
                    </a>
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.withdrawal') }}?search_key={{ $user->email }}">
                        @if ($user->payout_sum_amount)
                            ₹ {{ $user->payout_sum_amount }}
                        @else
                            ₹ 0
                        @endif
                    </a>
                </td>
                <td class="text-center">
                    @php
                        $associates = App\Models\User::where('referral_code', $user->referrer_code)->get();
                    @endphp
                    <a href="{{ route('admin.associates') }}?search_key={{ $user->referrer_code }}">{{ $associates->count() }}</a>
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
        <p>
            <b>Showing {{ ($users->currentpage() - 1) * $users->perpage() + 1 }} to
                {{ ($users->currentpage() - 1) * $users->perpage() + $users->count() }} of
                {{ $users->total() }} Users
            </b>
        </p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $users->appends(['search_date' => $search_date, 'search_key' => $search_key])->links() !!}
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
                    $('#table').html(data)
                }
            });
        });
    });

    $(function () {
        $('input:checkbox').on('click', function (event) {
            var user_id = $(this).val()
            $.ajax({
                type: 'GET',
                url: '{{route("admin.set.leaderboard.user.session")}}?value='+user_id,
                success: function(data) {
                }
            });
        });
    });
</script>
