<?php
/** @var \OCP\IL10N $l */
/** @var array $_ */

vendor_script('select2/select2');
vendor_style('select2/select2');

style('spreed', 'style');
style('spreed', 'comments');
script(
	'spreed',
	[
		'vendor/backbone/backbone-min',
		'vendor/backbone.radio/build/backbone.radio.min',
		'vendor/backbone.marionette/lib/backbone.marionette.min',
		'models/chatmessage',
		'models/chatmessagecollection',
		'models/localstoragemodel',
		'models/room',
		'models/roomcollection',
		'views/callinfoview',
		'views/chatview',
		'views/editabletextlabel',
		'views/roomlistview',
		'views/sidebarview',
		'views/tabview',
		'simplewebrtc',
		'webrtc',
		'signaling',
		'calls',
		'app',
		'init',
	]
);

// The 'application' property is set by \OC\TemplateLayout when the template is
// rendered as 'user'. As this is a public page the template is rendered as
// 'base', and thus the application name must be explicitly set by the template.
foreach(\OC_App::getNavigation() as $entry) {
	if ($entry['active']) {
		$_['application'] = $entry['name'];
		break;
	}
}
?>

<div id="notification-container">
	<div id="notification" style="display: none;"></div>
</div>
<div id="app" class="nc-enable-screensharing-extension" data-token="<?php p($_['token']) ?>">
	<div id="app-content" class="participants-1">

		<header>
			<div id="header" class="spreed-public">
				<div id="header-left">
					<a href="<?php print_unescaped(link_to('', 'index.php')); ?>" title="" id="nextcloud" target="_blank">
						<div class="logo logo-icon svg">
							<h1 class="hidden-visually">
								<?php p($theme->getName()); ?> <?php p(!empty($_['application'])?$_['application']: $l->t('Apps')); ?>
							</h1>
						</div>
					</a>
				</div>
				<div id="header-right">
				</div>
			</div>
		</header>

		<button id="video-fullscreen" class="icon-fullscreen-white public" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php p($l->t('Fullscreen')) ?>"></button>

		<div id="video-speaking">

		</div>
		<div id="videos">
			<div class="videoView videoContainer hidden" id="localVideoContainer">
				<video id="localVideo"></video>
				<div class="avatar-container hidden">
					<div class="avatar"></div>
				</div>
				<div class="nameIndicator">
					<button id="mute" class="icon-audio-white" data-placement="top" data-toggle="tooltip" data-original-title="<?php p($l->t('Mute audio')) ?>"></button>
					<button id="hideVideo" class="icon-video-white" data-placement="top" data-toggle="tooltip" data-original-title="<?php p($l->t('Disable video')) ?>"></button>
					<button id="screensharing-button" class="app-navigation-entry-utils-menu-button icon-screen-off-white screensharing-disabled" data-placement="top" data-toggle="tooltip" data-original-title="<?php p($l->t('Share screen')) ?>"></button>
					<div id="screensharing-menu" class="app-navigation-entry-menu">
						<ul>
							<li>
								<button id="show-screen-button">
									<span class="icon-screen"></span>
									<span><?php p($l->t('Show your screen'));?></span>
								</button>
							</li>
							<li>
								<button id="stop-screen-button">
									<span class="icon-screen-off"></span>
									<span><?php p($l->t('Stop screensharing'));?></span>
								</button>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="screens"></div>

		<div id="emptycontent">
			<div id="emptycontent-icon" class="icon-video"></div>
			<h2><?php p($l->t('Looking great today! :)')) ?></h2>
			<p class="uploadmessage"><?php p($l->t('Smile in 3… 2… 1!')) ?></p>
		</div>
	</div>
</div>
