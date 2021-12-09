
@extends('layouts.mail')

@section('content')

	<table width="640" valign="top" align="center" cellpadding="0" cellspacing="0" border="0" style="padding:0 8%;max-width: 640px; width: 100%;" class=" device-width">
		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: left; font-size: 24px; line-height: 34px; color: #262626; font-weight: 600;text-align: center">
				You’ve been invited to view the Loving Memories
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

		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: left;  font-size: 17px; line-height: 30px; color: #707070; font-weight: 300">
				<br>
				Memory can now be seen on the Loving Memories website at <a  style="font-family: 'Helvetica', Arial, sans-serif; text-align: left;  font-size: 17px; line-height: 30px; color: #3D72FB;" href="{{$memory['url']}}">{{$memory['url']}}</a>.
				<br>
			</td>
		</tr>

	</table>

@endsection




<div style="width:100%; background-color:#ffffff;">
	<div align="center">
		<table style="border-style:solid; border-color:#ffffff; background-color: #ffffff; border-collapse:collapse" border="0"  cellpadding="0" width="740">

			<tr>
				<td bgcolor="#ffffff"><table cellpadding="0" bgcolor="white" cellspacing="0" border="0"  align="center">

						<tr>
							<td height="19" >&nbsp;</td>
						</tr>
						<tr>
							<td valign="top"  width="665" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000; line-height:18px; background-color:#ffffff;">
								<table width="620" border="0" cellspacing="10" cellpadding="0" style="margin:auto;padding:0 3%" >
									<tr>

										<td width="100%"  style="font-family:Arial, Helvetica, sans-serif; font-size:36px; color:#000000; line-height:40px; text-align:justify" align="justify">
											<b>Shared memory</b>
										</td>
									</tr>

									<tr>
										<td valign="top"  width="634" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; line-height:20px; text-align:justify" align="justify">
											<br>
											{{$memory['logged_user_email']}} is shared {{$memory['name']}} memory with you<br><br>
										</td>
									</tr>
									<tr>
										<td valign="top"  width="634" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666; line-height:20px; text-align:justify" align="justify">
											<div><!--[if mso]>
												<v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:40px;v-text-anchor:middle;width:200px;" strokecolor="#040505" fillcolor="#040505">
													<w:anchorlock/>
													<center style="color:#ffffff;font-family:sans-serif;font-size:14px;font-weight:bold;">View</center>
												</v:rect>
												<![endif]--><a href="{{config('app.APP_FRONT_URL')}}/memory/?email={{$memory['email']}}&token={{$memory['access_token']}}"
												               style="background-color:#040505;border:1px solid #040505;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:14px;font-weight:bold;line-height:40px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;">View</a></div>
										</td>
									</tr>

								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>
