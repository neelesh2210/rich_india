<table>
    <thead>
        <tr>
            <th><b>Date</b></th>
            <th><b>Transaction ID</b></th>
            <th><b>Amount</b></th>
            <th><b>Purchase Type</b></th>
            <th><b>Package Name</b></th>
            <th><b>Name</b></th>
            <th><b>Email</b></th>
            <th><b>Phone</b></th>
            <th><b>Referral</b></th>
            <th><b>Sponsor Name</b></th>
            <th><b>Sponsor Referral Code</b></th>
            <th><b>Active Income</b></th>
            <th><b>Passive Income</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($plans as $key=>$plan)
            <tr>
                <td>{{$plan?->created_at?->format('d-m-Y h:i A')}}</td>
                <td>
                    @if ($plan?->payment_detail != null && $plan?->payment_detail != 'Updated by Admin')
                        {{json_decode($plan->payment_detail)?->id}}
                    @endif
                </td>
                <td>
                    @if ($plan->payment_detail != null && $plan->payment_detail != 'Updated by Admin')
                        {{json_decode($plan->payment_detail)?->amount}}
                    @else
                        0
                    @endif
                </td>
                <td>
                    @if($plan->amount == $plan->plan->amount)
                        New Plan
                    @else
                        Upgrade Plan
                    @endif
                </td>
                <td>
                    {{$plan?->plan?->title}}
                </td>
                <td>{{$plan?->user?->name}}</td>
                <td>{{$plan?->user?->email}}</td>
                <td>{{$plan?->user?->phone}}</td>
                <td>{{$plan?->user?->referrer_code}}</td>
                <td>{{optional($plan?->user?->sponsorDetail)->name}}</td>
                <td>{{optional($plan?->user?->sponsorDetail)->referrer_code}}</td>
                @foreach ($plan->commission as $plan_key=>$commission_plan_purchase)
                    <td>{{$commission_plan_purchase->commission}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
