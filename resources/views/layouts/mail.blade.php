<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="format-detection" content="telephone=no" />
	<meta name="format-detection" content="date=no">
	<meta name="format-detection" content="address=no">
	<meta name="color-scheme" content="light dark">
	<meta name="supported-color-schemes" content="light dark">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>AFSP</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Helvetica:wght@300;400;700&display=swap" rel="stylesheet">

	<!--[if mso]>
	<style type="text/css">
		/* mso adjustment for tamed superscripts */
		sup{font-size: 100% !important;}
		td.tdReset {width:660px !important; padding:0px 10px 0px 10px !important;}
		table.container{width:660px !important;}
		td.outlookTD {padding:10px 10px 10px 0px !important;}
	</style>
	<![endif]-->

	<!-- Start Mailer Content style -->
	<style type="text/css">
		/* What it does: Remove spaces around the email design added by some email clients. */
		/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
		}
		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}
		/* What is does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin:0 !important;
		}
		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}
		/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
		/* Note:- This is interfearing with supplied layout inheritance */
		/*table {
		  border-spacing: 0 !important;
		  border-collapse: collapse !important;
		  table-layout: fixed !important;
		  margin: 0 auto !important;
		}
		table table table {
		  table-layout: auto;
		}*/


		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode:bicubic;
			display: block;
		}
		/* What it does: A work-around for iOS meddling in triggered links. */
		*[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: none !important;
		}
		/* What it does: A work-around for Gmail meddling in triggered links. */
		.x-gmail-data-detectors,
		.x-gmail-data-detectors *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
		}
		/* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}
		/* If the above doesn't work, add a .g-img class to any image in question. */
		img.g-img + div {
			display:none !important;
		}
		/* What it does: Prevents underlining the button text in Windows 10 */
		.button-link {
			text-decoration: none !important;
		}
		/* responsive progression */
		/* fonts */
		/* Media Queries */
		@media screen and (max-width: 640px) {
			BODY[yahoo] .device-width {/* What it does: Forces elements to fluid width */
				width: 100% !important;
			}
			.dual-coli {
				width: auto !important;
			}
			.hidden-image {
				display:none !important
			}
			.title-mobi {
				max-width:70% !important;
			}
			.centered-text {
				width: 100% !important;
				padding:0 12% !important;
			}
			.column {margin-right:0}
			.size-1,.size-3 {font-size: 24px !important;}
			.size-2 {font-size: 20px !important;}
		}
		@media screen and (max-width: 480px) {
			.hidden-device {display: none !important;}
			.size-1,.size-3 {font-size: 20px !important;}
			.size-2 {font-size: 18px !important;}
		}
		@media screen and (max-width: 600px) {
			.column.tri-coli{
				width: 150px!important;
			}
			.hide-mobile{
				display: none!important;
			}
		}
		@media screen and (max-width: 320px) {
			.size-1,.size-3 {font-size: 18px !important;}
			.size-2 {font-size: 16px !important;}
		}
		@media (prefers-color-scheme: dark) {
			/*td, td span.blue {
				color: #ffffff !important;
			}*/

			td span.title-mobi  {

			}
			body{

			}
			table,td {
				/*background:#000000 !important;*/
			}
			.step-links, .step-links table, .step-links td, .step-links div {
				/*background-color:#ffffff !important;*/
				/*background:#ffffff !important;*/
				/*color:#000000 !important;*/
			}
		}
	</style>
	<!-- End Mailer Content style -->
</head>

<body bgcolor="#ffffff" link="#295AA6" vlink="#295AA6" alink="#295AA6" style="background-color: #ffffff; margin: 0; padding: 0" yahoo="fix">
<div id="wrapper" style="background-color: #ffffff;">

	<table width="640" valign="top" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" class=" device-width" style="background-color: #ffffff; border-top:3px solid #396DFF">

		<!--header logo Start-->
		<tr>
			<td valign="top" height="60"></td>
		</tr>
		<tr>
			<td valign="top" align="center">
				<img src="{{url('images/mailer/header-logo.png')}}" width="179" height="55" alt="" style="display: block; margin: 0; padding: 0; max-width: 179px; width: 100%; height: auto; vertical-align: top; border: 0; outline: none; background-color: transparent;" class=" g-img" />
			</td>
		</tr>
		<tr>
			<td valign="top" height="40" ></td>
		</tr>
		<!--header logo end-->


		<tr>
			<td colspan="3">
				@yield("content")
			</td>
		</tr>



		<!-- cta notification box -->
		<tr>
			<td valign="top" height="40" ></td>
		</tr>
		<tr>
			<td valign="top">
				<table width="640" valign="top" align="center" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px; width: 100%; background:#EAEAEA;" class=" device-width">
					<tr>

						<!--spacer Start-->
						<td valign="top" width="60"></td>
						<!--spacer End-->

						<td valign="middle" style="font-family: 'Helvetica', Arial, sans-serif; text-align: center;  font-size: 17px; line-height: 24px; color: #262626; font-weight: 300" height="80">
							If you are experiencing a crisis please call the National Suicide Prevention Lifeline at 1-800-273-TALK or text TALK to 741-741.
						</td>

						<!--spacer Start-->
						<td valign="top" width="60" ></td>
						<!--spacer End-->
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td bgcolor="#ffffff" valign="top" height="40"></td>
		</tr>
		<!-- cta notification box end -->

		<!-- footer start -->
		<tr>
			<td valign="top">
				<table width="640" valign="top" align="center" cellpadding="0" cellspacing="0" border="0"
				       bgcolor="#FFFFFF" class="device-width" style="background-color: #FFFFFF">

					<tr>
						<td valign="top" align="center" height="20"></td>
					</tr>
					<!-- Footer logo -->
					<tr>
						<td valign="top" align="center" bgcolor="#FFFFFF">
							<table class="step-links" width="90" height="50" border="0"
							       align="center" cellspacing="0" cellpadding="0"
							       style="margin: 0; padding: 0; border: 0; width: 100%; background-color:#FFFFFF; max-width:90px;">
								<tr>
									<td valign="top" align="center">
										<img src="{{url('images/mailer/footer-logo.png')}}" alt="" width="92"
										     height="37"
										     style="margin: 0; padding: 0; display: block;max-width: 123px; width: 100%; height: auto; vertical-align: top; border: 0;"
										     class="g-img"/>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td valign="top" align="center" height="20"></td>
					</tr>
					<!-- Footer social -->
					<tr>
						<td valign="top" align="center">
							<table width="640" valign="top" align="center" cellpadding="0" cellspacing="0" border="0"
							       bgcolor="#FFFFFF" class="device-width" style="background-color: #FFFFFF">

								<tr>
									<td valign="top" width="80"></td>
									<td valign="top" style="max-width: 566px;">
										<table valign="top" align="center" cellpadding="0" cellspacing="0" border="0"
										       bgcolor="#FFFFFF" class="device-width" style="background-color: #FFFFFF">
											<!-- FOOTER STEP LINKS END -->
											<tr>
												<td valign="top" style="max-width: 566px;">
													<!-- FOOTER STEP LINKS -->
													<table class="step-links" width="100%" border="0" align="center"
													       cellspacing="0" cellpadding="0"
													       style=" padding: 0; border: 0; width: 100%; background-color:#FFFFFF; max-width: 566px;">
														<tr>
															<td align="center" bgcolor="#FFFFFF"
															    style="padding-top: 30px; padding-bottom: 5px">
																<table width="100%" border="0" align="center"
																       cellspacing="0" cellpadding="0"
																       style="margin: 0; padding: 0; border: 0; width: 100%; min-width: 100%; max-width: 566px;">
																	<tr>
																		<td class="three-column"
																		    style="text-align: center;">
																			<!--[if (gte mso 9)|(IE)]>
																			<table align="center" valign="top"
																			       style="vertical-align: top;">
																				<tr>
																					<td width="120" valign="top">
																			<![endif]-->
																			<div class="column"
																			     style="display: inline-block !important; vertical-align: top; width:40px; margin-bottom: 15px;">
																				<table width="100%"
																				       style="width: 100%; min-width: 100%;">
																					<tr>
																						<td class="inner">
																							<table class="contents"
																							       width="100%"
																							       style="width: 100%; min-width: 100%;">
																								<tr>
																									<td style="text-align: center;">
																										<a href="#"
																										   height="20"
																										   style="text-decoration: none; height:20px;">
																											<img src="{{url('images/mailer/icon-facebook.png')}}"
																											     width="20"
																											     height="20"
																											     alt=""
																											     style="max-width:20px; margin: 0; padding: 0; display: inline-block; width: 100%; height: auto; vertical-align: top; border: 0;"/>
																										</a>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</div>
																			<!--[if (gte mso 9)|(IE)]>
																			</td>
																			<td width="40" valign="top">
																			<![endif]-->

																			<div class="column"
																			     style="display: inline-block !important;vertical-align: top; width:40px; margin-bottom: 15px;">
																				<table width="100%"
																				       style="width: 100%; min-width: 100%;">
																					<tr>
																						<td class="inner">
																							<table class="contents"
																							       width="100%"
																							       style="width: 100%; min-width: 100%;">
																								<tr>
																									<td style="text-align: center;">
																										<a href="#"
																										   height="20"
																										   style="text-decoration: none; height:20px;">
																											<img src="{{url('images/mailer/icon-instagram.png')}}"
																											     width="20"
																											     height="20"
																											     alt=""
																											     style="max-width: 20px; margin: 0; padding: 0; display: inline-block; width: 100%; height: auto; vertical-align: top; border: 0;"/>
																										</a>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</div>
																			<!--[if (gte mso 9)|(IE)]>
																			</td>
																			<td width="40" valign="top">
																			<![endif]-->

																			<div class="column"
																			     style="display: inline-block !important; vertical-align: top;width:40px; margin-bottom: 15px;">
																				<table width="100%"
																				       style="width: 100%; min-width: 100%;">
																					<tr>
																						<td class="inner">
																							<table class="contents"
																							       width="100%"
																							       style="width: 100%; min-width: 100%;">
																								<tr>
																									<td style="text-align: center;">
																										<a href="#"
																										   height="20"
																										   style="text-decoration: none; height:20px;">
																											<img src="{{url('images/mailer/icon-twitter.png')}}"
																											     width="20"
																											     height="20"
																											     alt=""
																											     style="max-width:20px; margin: 0; padding: 0; display: inline-block; width: 100%; height: auto; vertical-align: top; border: 0;"/>
																										</a>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</div>
																			<!--[if (gte mso 9)|(IE)]>
																			</td>
																			<td width="40" valign="top">
																			<![endif]-->


																			<div class="column"
																			     style="display: inline-block !important; vertical-align: top;width:40px; margin-bottom: 15px;">
																				<table width="100%"
																				       style="width: 100%; min-width: 100%;">
																					<tr>
																						<td class="inner">
																							<table class="contents"
																							       width="100%"
																							       style="width: 100%; min-width: 100%;">
																								<tr>
																									<td style="text-align: center;">
																										<a href="#"
																										   height="20"
																										   style="text-decoration: none; height:50px;">
																											<img src="{{url('images/mailer/icon-linkedin.png')}}"
																											     width="20"
																											     height="20"
																											     alt=""
																											     style="max-width:20px; margin: 0; padding: 0; display: inline-block; width: 100%; height: auto; vertical-align: top; border: 0;"/>
																										</a>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</div>
																			<!--[if (gte mso 9)|(IE)]>
																			</td>
																			<td width="40" valign="top">
																			<![endif]-->

																			<div class="column"
																			     style="display: inline-block !important; vertical-align: top;width:40px; margin-bottom: 15px;">
																				<table width="100%"
																				       style="width: 100%; min-width: 100%;">
																					<tr>
																						<td class="inner">
																							<table class="contents"
																							       width="100%"
																							       style="width: 100%; min-width: 100%;">
																								<tr>
																									<td style="text-align: center;">
																										<a href="#"
																										   height="20"
																										   style="text-decoration: none; height:20px;">
																											<img src="{{url('images/mailer/icon-youtube.png')}}"
																											     width="24"
																											     height="20"
																											     alt=""
																											     style="max-width:24px; margin: 0; padding: 0; display: inline-block; width: 100%; height: auto; vertical-align: top; border: 0;"/>
																										</a>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</div>
																			<!--[if (gte mso 9)|(IE)]>
																			</td>
																			<td width="40" valign="top">
																			<![endif]-->

																			<div class="column"
																			     style="display: inline-block !important; vertical-align: top;width:40px; margin-bottom: 15px;">
																				<table width="100%"
																				       style="width: 100%; min-width: 100%;">
																					<tr>
																						<td class="inner">
																							<table class="contents"
																							       width="100%"
																							       style="width: 100%; min-width: 100%;">
																								<tr>
																									<td style="text-align: center;">
																										<a href="#"
																										   height="50"
																										   style="text-decoration: none; height:20px;">
																											<img src="{{url('images/mailer/icon-mighty.png')}}"
																											     width="30"
																											     height="20"
																											     alt=""
																											     style="max-width:30px; margin: 0; padding: 0; display: inline-block; width: 100%; height: auto; vertical-align: top; border: 0;"/>
																										</a>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</div>
																			<!--[if (gte mso 9)|(IE)]>
																			</td>
																			</tr>
																			</table>
																			<![endif]-->
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
									<td width="80"></td>
								</tr>
							</table>

						</td>
					</tr>
					<!-- Footer unsubscribe -->
					<tr>
						<td valign="top" align="center">
							<table valign="top" align="center" cellpadding="0" cellspacing="0" border="0"
							       bgcolor="#FFFFFF" class="device-width" style="background-color: #FFFFFF">
								<tr>
									<td valign="top" height="20px" align="center" bgcolor="#FFFFFF"
									    style="background-color: #FFFFFF!important;">
										<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"
										       style="background-color: #FFFFFF!important;border-collapse: collapse; border-spacing: 0; table-layout: fixed;"
										       align="center">
											<tr>
												<td valign="top" height="10" align="center" bgcolor="#FFFFFF">
													&nbsp;
												</td>
											</tr>

											<tr>
												<td valign="top" align="center" bgcolor="#FFFFFF"
												    style="font-family: 'Helvetica', Arial, sans-serif; text-align: center; font-size: 12px; line-height: 18px; color: #8E8E8E!important;">
													@isset($view_browser_link)
														If you have trouble reading this email, <a href="{{url($view_browser_link)}}" target="_blank" style="font-size: 12px; line-height: 18px; color: #8E8E8E!important;">view in your browser.</a> <br>
													@endisset
													@isset($memory['view_browser_link'])
															If you have trouble reading this email, <a href="{{url($memory['view_browser_link'])}}" target="_blank" style="font-size: 12px; line-height: 18px; color: #8E8E8E!important;">view in your browser.</a> <br>
													@endisset
													@isset($user['view_browser_link'])
														If you have trouble reading this email, <a href="{{url($user['view_browser_link'])}}" target="_blank" style="font-size: 12px; line-height: 18px; color: #8E8E8E!important;">view in your browser.</a> <br>
													@endisset
													@isset($memory['unsubscribe_link'])
														If you wouldn’t like to receive newsletters from AFSP <a href="{{$memory['unsubscribe_link']}}" target="_blank" style="font-size: 12px; line-height: 18px; color: #8E8E8E!important;">unsubscribe here</a>.
													@endisset
													@isset($user['unsubscribe_link'])
														If you wouldn’t like to receive newsletters from AFSP <a href="{{$user['unsubscribe_link']}}" target="_blank" style="font-size: 12px; line-height: 18px; color: #8E8E8E!important;">unsubscribe here</a>.
													@endisset

												</td>
											</tr>
											<tr>
												<td valign="top" height="30" align="center" bgcolor="#FFFFFF">
													&nbsp;
												</td>
											</tr>

										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<!-- footer end -->

	</table>
</div>
</body>
