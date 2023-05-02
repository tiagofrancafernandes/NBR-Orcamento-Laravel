@extends('layouts.admin-base')
@section('content')
<div class="content with-padding">
    <div class="table-responsive">
        <table id="js-table-list" class="basic-table dashboard-box-list">
            <tbody><tr>
                <th>Membership</th>
                <th>Payment Mode</th>
                <th>Start Date</th>
                <th>Expiry Date</th>
                                                    </tr>
            <tr>
                <td>Trial Plan</td>
                <td>
                    One Time                                        </td>
                <td>-</td>
                <td>-</td>
                                                    </tr>
            <tr>
                <td colspan="7" align="right">
                    <button type="button" class="button" onclick="window.location.href='https://quickai.bylancer.com/membership/changeplan'">Change Plan</button>
                </td>
            </tr>
        </tbody></table>
    </div>
</div>
@endsection
