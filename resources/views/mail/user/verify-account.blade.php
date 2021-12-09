@extends('layouts.mail')

@section('content')
	<table width="640" valign="top" align="center" cellpadding="0" cellspacing="0" border="0" style="padding:0 8%;max-width: 640px; width: 100%;" class=" device-width">
		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: left; font-size: 24px; line-height: 34px; color: #262626; font-weight: 600;text-align: center">
				<b>Please verify your account</b>
				<br>
			</td>
		</tr>

		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: center;  font-size: 17px; line-height: 30px; color: #707070; font-weight: 300">
				<br>
				Thank you for creating an account with Loving Memories by the American Foundation for Suicide Prevention. We hope you will find your experience with Loving Memories to be rewarding and healing. Please verify your email by clicking on the link below.
				<br><br>
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
								<v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{$url}}" style="height:50px;v-text-anchor:middle;width:180px;" stroke="f" fillcolor="#396DFF">
									<w:anchorlock/>
									<center>
								<![endif]-->
								<a href="{{$url}}"
								   style="background-color:#396DFF;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:14px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:180px;-webkit-text-size-adjust:none;">Verify Your Account</a>
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
				If you did not create an account with Loving Memories, please let us know by emailing <a style="font-family: 'Helvetica', Arial, sans-serif; text-align: center;  font-size: 15px; line-height: 30px; color: #3D72FB;" href="mailto:lovingmemories@afsp.org">lovingmemories@afsp.org</a>.
				<br><br>
			</td>
		</tr>

		<tr>
			<td valign="top" style="font-family: 'Helvetica', Arial, sans-serif; text-align: left;  font-size: 17px; line-height: 30px; color: #707070; font-weight: 300">
				<br>
				<b>About the American Foundation for Suicide Prevention</b>
				<br><br>
				The American Foundation for Suicide Prevention is dedicated to saving lives and bringing hope to those affected by suicide. AFSP creates a culture that’s smart about mental health through education and community programs, develops suicide prevention through research and advocacy, and provides support for those affected by suicide. Led by CEO Robert Gebbia and headquartered in New York, AFSP has local chapters in all 50 states with programs and events nationwide. Learn more about AFSP in its latest Annual Report, and join the conversation on suicide prevention by following AFSP on Facebook, Twitter, Instagram, and YouTube.
				<br><br>
				By creating a Loving Memories account, you have agreed to receive our newsletter and other occasional emails from AFSP. If you would like to opt out of email communications not related to your Loving Memories account, you may unsubscribe here.
				<br><br>
				Thank you and welcome to the AFSP family.
				<br><br>
			</td>
		</tr>

	</table>



@endsection

