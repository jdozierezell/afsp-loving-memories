@extends('layouts.mail')

@section('content')

	<table width="640" valign="top" align="center" cellpadding="0" cellspacing="0" border="0" style="padding:0 8%;max-width: 640px; width: 100%;" class=" device-width">
		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: left; font-size: 24px; line-height: 34px; color: #262626; font-weight: 600;text-align: center">
				You’ve been invited to contribute to Loving Memories
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
								   style="background-color:#396DFF;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:14px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:180px;-webkit-text-size-adjust:none;">Contribute Memory</a>
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

				You have received an invitation from {{$memory['logged_user_email']}} to contribute to the memory for {{$memory['name']}}.
				Loving Memories by the American Foundation for Suicide Prevention provides a space to remember a friend, family member,
				or other loved one who died by suicide. It is a space of hope and healing. If you would like to contribute to this memory,
				you may do so here <a href="{{$memory['url']}}" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;">{{$memory['url']}}</a>

				<br><br>
				Following your submission, your contribution to this memory must be approved by the person who invited you to contribute as well as our loss and healing team.
				<br><br>
				If you choose not to contribute, you may ignore this email. To report abuse, please email
				<a href="mailto:lovingmemories@afsp.org" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;">lovingmemories@afsp.org</a>.
				<br>
			</td>
		</tr>

		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: left;  font-size: 17px; line-height: 30px; color: #707070; font-weight: 300">
				<br>

				<b>About the American Foundation for Suicide Prevention</b>
				<br><br>
				<a target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;" href="">The American Foundation for Suicide Prevention</a> is dedicated to
				saving lives and bringing hope to those affected by suicide. AFSP
				creates a culture that’s smart about mental health through education
				and community programs, develops suicide prevention through
				research and advocacy, and provides support for those affected by
				suicide. Led by CEO <a href="" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;">Robert Gebbia</a> and headquartered in New York,
				AFSP has <a href="" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;" >local chapters</a> in all 50 states with programs and events
				nationwide. Learn more about AFSP in its latest <a href="" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;">Annual Report,</a> and
				join the conversation on suicide prevention by following AFSP on
				<a href="" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;" >Facebook,</a> <a href="" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;" >Twitter,</a> <a href="" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;" >Instagram,</a> and <a href="" target="_blank" style="color:#3D72FB; font-size: 17px; line-height: 24px;" >YouTube.</a>
				<br>
			</td>
		</tr>

	</table>

@endsection
