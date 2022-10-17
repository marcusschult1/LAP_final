#include <iostream>

using namespace std;

int main() {

	int x = 0;
	int s = 0;
	int erg = 0;

	cout << "Geben Sie eine Zahl zur Quersummenberechnung ein: ";
	cin >> x;

	while (x > 0) {
		s = s + x % 10;
		x /= 10;
	}
	
	cout << "Quersumme= ";
	cout << s;
	

	//cout << "Erg = " << erg << endl;



}
