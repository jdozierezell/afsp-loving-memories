@extends('layouts.mail')

@section('content')

	<table width="640" valign="top" align="center" cellpadding="0" cellspacing="0" border="0" style="padding:0 8%;max-width: 640px; width: 100%;" class=" device-width">
		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: left; font-size: 24px; line-height: 34px; color: #262626; font-weight: 600;text-align: center">
				New Contribute Memory Received
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
			<td valign="top" align="center">
				<table width="200" border="0" align="center" cellspacing="0"
				       cellpadding="0"
				       style="margin: 0; padding: 0; border: 0; width: 200px; max-width:200px">
					<tr>
						<td valign="top" align="right" bgcolor="#FFFFFF">
							<img src="{{url('images/mailer/btn-left.png')}}" alt=""
							     width="30" height="50"
							     style="margin: 0; padding: 0; display: block;max-width: 30px; width: 30px; height: 50px; vertical-align: top; border: 0;"
							     class="g-img" />
						</td>
						<td valign="top" align="center" bgcolor="#396DFF"
						    width="180" height="50"
						    style="width:100%; max-width:180px; height:50px;">

							<div>
							<!--[if mso]>
								<v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{$memory['url']}}" style="height:50px;v-text-anchor:middle;width:180px;" stroke="f" fillcolor="#396DFF">
									<w:anchorlock/>
									<center>
								<![endif]-->
								<a href="{{$memory['url']}}"
								   style="background-color:#396DFF;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:14px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:180px;-webkit-text-size-adjust:none;">Visit Memory</a>
								<!--[if mso]>
								</center>
								</v:rect>
								<![endif]-->
							</div>

						</td>
						<td valign="top" align="left" bgcolor="#FFFFFF">
							<img src="{{url('images/mailer/btn-right.png')}}" alt=""
							     width="30" height="50"
							     style="margin: 0; padding: 0; display: block;max-width: 30px; width: 30px; height: 50px; vertical-align: top; border: 0;"
							     class="g-img" />
						</td>
					</tr>


				</table>
			</td>
		</tr>

	</table>

@endsection


