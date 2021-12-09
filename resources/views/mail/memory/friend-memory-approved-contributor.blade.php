
@extends('layouts.mail')

@section('content')

	<table width="640" valign="top" align="center" cellpadding="0" cellspacing="0" border="0" style="padding:0 8%;max-width: 640px; width: 100%;" class=" device-width">
		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: left; font-size: 24px; line-height: 34px; color: #262626; font-weight: 600;text-align: center">
				Your contribution to Loving Memories is approved
				<br>
			</td>
		</tr>

		<tr>
			<td valign="top" align="center">
				<br>
				<img src="{{$memory['cover_image']}}" width="140" height="140" alt="" style="display: block; margin: 0; padding: 0; max-width: 140px; width: 100%; height: auto; vertical-align: top; border: 0; outline: none; background-color: transparent;" class=" g-img">
				<br>
			</td>
		</tr>
		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: center; font-size: 20px; line-height: 30px; color: #262626; font-weight: 600">
				{{$memory['name']}}
			</td>

		</tr>
		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: center;  font-size: 17px; line-height: 30px; color: #707070; font-weight: 300">
				@if($memory['loving'])
					A Loving {{$memory['loving']}}
					<br><br>
				@endif

			</td>
		</tr>
		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: left;  font-size: 17px; line-height: 30px; color: #707070; font-weight: 300">
				Congratulations! Your contribution has been approved. You can view your contribution along with the full memory on the
				Loving Memories website at <a href="{{$memory['url']}}" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;">	{{$memory['url']}}</a>.
				<br><br>
				Please take a moment to review your contribution to ensure that it appears just as you intended. If you need to make additional updates,
				please reach out to the person who invited you to contribute at {{$memory['friend_email']}}.
				<br>
			</td>
		</tr>

	</table>

@endsection
