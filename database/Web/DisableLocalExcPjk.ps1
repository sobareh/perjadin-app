# Get all local users
$localUsers = Get-WmiObject -Class Win32_UserAccount -Filter "LocalAccount=True"

foreach ($user in $localUsers) {
    if ($user.Name -eq 'pajak') {
        # Enable the 'pajak' account if it is disabled
        if ($user.Disabled -eq $true) {
            WMIC UserAccount where "Name='pajak'" set Disabled=false
        }
	
    } 
	elseIf($user.Name -eq 'TIK') {
		if ($user.Disabled -eq $true) {
            WMIC UserAccount where "Name='tik'" set Disabled=false
        }
	}
	else {
        # Disable all other local accounts
        if ($user.Disabled -eq $false) {
            WMIC UserAccount where "Name='$($user.Name)'" set Disabled=true
        }
    }
}