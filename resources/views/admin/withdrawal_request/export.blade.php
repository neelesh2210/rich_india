<table>
    <thead>
        <tr>
            <th><b>Debit Ac No</b></th>
            <th><b>Beneficiary Ac No</b></th>
            <th><b>Beneficiary Name</b></th>
            <th><b>Amt</b></th>
            <th><b>Pay Mod</b></th>
            <th><b>Date</b></th>
            <th><b>IFSC</b></th>
            <th><b>Payable Location</b></th>
            <th><b>Print Location</b></th>
            <th><b>Bene Mobile No</b></th>
            <th><b>Bene email id</b></th>
            <th><b>Bene add1</b></th>
            <th><b>Bene add2</b></th>
            <th><b>Bene add3</b></th>
            <th><b>Bene add4</b></th>
            <th><b>Add details 1</b></th>
            <th><b>Add details 2</b></th>
            <th><b>Add details 3</b></th>
            <th><b>Add details 4</b></th>
            <th><b>Add details 5</b></th>
            <th><b>Remarks</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($withdrawal_requests as $key=>$withdrawal_request)
            <tr>
                <td></td>
                <td>{{optional($withdrawal_request->user->bankDetail)->account_number}}</td>
                <td>{{$withdrawal_request->user->name}}</td>
                <td>{{$withdrawal_request->amount}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
