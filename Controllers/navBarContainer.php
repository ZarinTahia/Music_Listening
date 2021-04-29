<div id="navBarContainer">
	<nav class="navBar">

		<span role="link" tabindex="0" onclick="openPage('../Controllers/index.php')" class="logo">
			<img src="..Views/images/icons/logo.png">
		</span>


		<div class="group">

			<div class="navItem">
				<span role='link' tabindex='0' onclick='openPage("../Controllers/search.php")' class="navItemLink">
					Search
					<img src="..Views/images/icons/search.png" class="icon" alt="Search">
				</span>
			</div>

		</div>

		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('../Controllers/browse.php')" class="navItemLink">Browse</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('../Controllers/yourMusic.php')" class="navItemLink">Your Music</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('../Controllers/settings.php')" class="navItemLink"><?php echo $userLoggedIn->getFirstAndLastName(); ?></span>
			</div>
		</div>

	</nav>
</div>