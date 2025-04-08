page=$1
idkey="00000000966b526f"
tmpFile="file.tmp"

keyCPU=$(grep -Po '^Serial\s*:\s*\K[[:xdigit:]]{16}' /proc/cpuinfo | grep $idkey)
state=$(grep "html>" $page)
#echo $state
#echo "$keyCPU"
if [ "$keyCPU" != "" ]; then	
	if [ "$state" == "" ]; then
		#Decryption
		cat $page | openssl enc -aes-128-cbc -a -d -salt -pass pass:$keyCPU > $tmpFile
		mv $tmpFile $page
	fi	
	echo "OK"
else		
	if [ "$state" == "" ]; then
		echo "ERROR 1: CONTACT ADMINISTRATOR"
	else
		#Encryption
		cat $page | openssl enc -aes-128-cbc -a -salt -pass pass:$keyCPU > $tmpFile
		mv $tmpFile $page
		echo "ERROR 2: CONTACT ADMINISTRATOR"
	fi
fi

