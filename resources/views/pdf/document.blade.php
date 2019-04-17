@php
$applicant = DB::table('users')->where('id',$user_id)->first();
@endphp<!DOCTYPE html>

<html>

<head>
<style>

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size: 20px;
}

td, th {
    border: 1px solid #00000;
    text-align: left;
    padding: 8px;
}

p {
    text-align: center;
    font-size: 40px;
}

</style>

</head>

<body>

<br/>

<p>বাণিজ্য মেলা আয়োজনের অনুমোদনের জন্য অনলাইন আবেদন ফরম</p>

<br/>

<table>
<tbody>
<tr>
<td width="6%">১.</td>
<td colspan="6">মেলা/প্রদর্শনীর নাম : {{ $festival_name }}</td>
</tr>
<tr>
<td width="6%">২.</td>
<td colspan="6">মেলার ধরণ : {{ $festival_type == 'national' ? 'দেশী' : 'আন্তর্জাতিক' }}</td>
</tr>
<tr>
<td width="6%">৩.</td>
<td colspan="6">মেলা/প্রদর্শনীর মেয়াদকাল : {{ date('F d, Y', strtotime($from) ) }} - {{ date('F d, Y', strtotime($to) ) }}</td>
</tr>
<tr>
<td width="6%">৪.</td>
<td colspan="6">মেলা/প্রদর্শনীর স্থান : {{ $festival_place }}</td>
</tr>
<tr>
<td width="6%">৫.</td>
<td colspan="6">আবেদনকারী প্রতিষ্ঠান/সংগঠনের নাম : {{ $applicant->organization_name }}</td>
</tr>
<tr>
<td width="6%" rowspan="2">৬.</td>
<td colspan="6">
প্রতিষ্ঠান/সংগঠনের ঠিকানা : {{ $applicant->organization_address }} 
</td>
<tr>
<td colspan="2"> টেলিফোন নম্বর : <br/>{{ $applicant->telephone_number }}</td>
<td colspan="2"> মোবাইল নম্বর : <br/>{{ $applicant->phone_number }}</td>
<td colspan="2"> ইমেইল : <br/>{{ $applicant->email }}</td>
</td>
</tr>
<tr>
<td width="6%">৭.</td>
<td colspan="6">প্রধান নির্বাহীর নাম/যোগাযোগকারী কর্মকর্তার নাম : {{ $applicant->name }}</td>
</tr>
<tr>
<td width="6%">৮.</td>
<td colspan="6">কোম্পানি রেজি: নম্বর/ট্রেড লাইসেন্স : {{ $reg_no }}</td>
</tr>
<tr>
<td width="6%">৯.</td>
<td colspan="6">টিন সার্টিফিকেট ও আয়কর সার্টিফিকেট : {{ $tin_no }}</td>
</tr>
<tr>
<td width="6%">১০.</td>
<td colspan="6">ভ্যাট রেজি: নম্বর : {{ $vat_reg_no }}</td>
</tr>
<tr>
<td width="6%" rowspan="2">১১.</td>
<td colspan="2" rowspan="2">চালান নম্বর : <br/>{{ $chaalan_no }} </td> 
<td colspan="2" rowspan="2"> তারিখ : {{ $date }}</td>
<td colspan="2"> ব্যাংকের নাম : <br/>{{ $bank_name }} </td>
</tr>
<tr>
<td colspan="2"> শাখার নাম: <br/>{{ $branch_name }}</td>
</tr>
<tr>
<td width="6%">১২.</td>
<td colspan="6">চালান ( কোড নং-১১৭০১০০০১২৬৮১) জমাকৃত টাকার পরিমাণ: <br/>
* {{ $festival_type == 'national' ? 'স্থানীয় মেলা আয়োজনের ফি ৫০০০/- (পাঁচ হাজার) টাকা' : 'আন্তর্জাতিক মেলা আয়োজনের ফি ২০০ মার্কিন ডলারের সমপরিমাণ টাকা' }}
</td>
</tr>
</tbody>
</table>

</body>
</html>