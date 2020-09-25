presence = 0.0f; 
absence = 0.0f; 
retard = 0.0f; 
heure = 0.0f; 
if ((int)allAbsanceInfo1.Rows[index2][3]== -1 && (int)allAbsanceInfo1.Rows[index2][9] == 0) //entrée matin non enregistrée
{
	if ((int)allAbsanceInfo1.Rows[index2][4]== -1 && (int)allAbsanceInfo1.Rows[index2][10] == 0) //sortie matin non enregistrée
	{
		if ((int)allAbsanceInfo1.Rows[index2][5] == -1 && (int)allAbsanceInfo1.Rows[index2][11] == 0)//entrée soir non enregistrée
		{
			//if ((int)allAbsanceInfo1.Rows[index2][6]== -1 && (int)allAbsanceInfo1.Rows[index2][12] == 0)//sortie soir non enregistrée
			absence++; 
		}
		else // entrée soir enregistrée 
		{
			absence +=0.5; //absence matin
			//voir le pointage de sortie le soir
			if((int)allAbsanceInfo1.Rows[index2][6] == -1 && (int)allAbsanceInfo1.Rows[index2][12] == 0)
			{
				absence +=0.5; //absence soir
			}
			else
			{
				presence+= 0.5; 
				heure+=240; 
				//pointage d'entrée le soir
				if ((int)allAbsanceInfo1.Rows[index2][5] > 0) //retard
				{
					if((int)allAbsanceInfo1.Rows[index2][5] > delitP[7]) //voir si la durée retard dépasse la durée de retard permise
					{	
						retard += (int)allAbsanceInfo1.Rows[index2][5] - delitP[7]; 
						heure -= (int)allAbsanceInfo1.Rows[index2][5]; 
					}
				}
				else //heure supp
				{
					heuresupp += -1 * (int)allAbsanceInfo1.Rows[index2][5]; 
				}
				if ((int)allAbsanceInfo1.Rows[index2][6] > 0) //heuresupp
				{
					heuresupp += (int)allAbsanceInfo1.Rows[index2][6]; 
				}
				else //retard
				{
					if((-1*(int)allAbsanceInfo1.Rows[index2][6]) > delitP[8]) //voir si la durée retard dépasse la durée de retard permise
					{
						retard += (-1* (int)allAbsanceInfo1.Rows[index2][6]) - delitP[8]; 
						heure -= (-1* (int)allAbsanceInfo1.Rows[index2][6]); 
					}
				}
			}
		}
	}
	else
	{ // sortie matin enregistrée entrée non enregistrée
		absence +=0.5; 
		//voir le pointage de sortie le soir
		if((int)allAbsanceInfo1.Rows[index2][6] == -1 && (int)allAbsanceInfo1.Rows[index2][12] == 0)
		{
			absence +=0.5; 
		}
		else
		{
			presence+= 0.5; 
			heure += 240;  
			//pointage d'entrée le soir
			if ((int)allAbsanceInfo1.Rows[index2][5] > 0) //retard
			{
				if((int)allAbsanceInfo1.Rows[index2][5] > delitP[7]) //voir si la durée retard dépasse la durée de retard permise
				{	
					retard += (int)allAbsanceInfo1.Rows[index2][5] - delitP[7]; 
					heure -= (int)allAbsanceInfo1.Rows[index2][5]; 
				}
			}
			else //heure supp
			{
				heuresupp += -1 * (int)allAbsanceInfo1.Rows[index2][5]; 
			}
			if ((int)allAbsanceInfo1.Rows[index2][6] > 0) //heuresupp
			{
				heuresupp += (int)allAbsanceInfo1.Rows[index2][6]; 
			}
			else //retard
			{
				if((-1*(int)allAbsanceInfo1.Rows[index2][6]) > delitP[8]) //voir si la durée retard dépasse la durée de retard permise
				{
					retard += (-1* (int)allAbsanceInfo1.Rows[index2][6]) - delitP[8]; 
					heure = -1* (int)allAbsanceInfo1.Rows[index2][6]); 
				}
			}
		}
	}
}
else 
{  //pointage matin entrée ok
	if ((int)allAbsanceInfo1.Rows[index2][4]== -1 && (int)allAbsanceInfo1.Rows[index2][10] == 0)
	{
		absence += 0.5; 
	}
	else
	{   //pointage matin entrée ok pointage matin sortie ok
		//pointage matin 
		presence += 0.5; 
		heure += 240; 
		if ((int)allAbsanceInfo1.Rows[index2][3] > 0) //retard
		{
			if((int)allAbsanceInfo1.Rows[index2][3] > delitP[3]) //voir si la durée retard dépasse la durée de retard permise
			{
				retard += (int)allAbsanceInfo1.Rows[index2][3] - delitP[3]; 
				heure -= (int)allAbsanceInfo1.Rows[index2][3]; 
			}
		}
		else //heure supp
		{
			heuresupp += -1 * (int)allAbsanceInfo1.Rows[index2][3]; 
		}
		if ((int)allAbsanceInfo1.Rows[index2][4] > 0) 
		{
			heuresupp += (int)allAbsanceInfo1.Rows[index2][4]; 
		}
		else
		{
			if((-1*(int)allAbsanceInfo1.Rows[index2][4]) > delitP[5]) //voir si la durée retard dépasse la durée de retard permise
			{	
				retard += (int)allAbsanceInfo1.Rows[index2][4] - delitP[5]; 
				heure = (int)allAbsanceInfo1.Rows[index2][4];
			}
		}
		if ((int)allAbsanceInfo1.Rows[index2][5] == -1 && (int)allAbsanceInfo1.Rows[index2][11] == 0)
		{
			absence += 0.5; 
		}
		else
		{
			if ((int)allAbsanceInfo1.Rows[index2][6]== -1 && (int)allAbsanceInfo1.Rows[index2][12] == 0)
			{
				absence += 0.5; 
			}
			else
			{
				presence += 0.5;
				heure += 240; 
				if ((int)allAbsanceInfo1.Rows[index2][5] > 0) //retard
				{
					if((int)allAbsanceInfo1.Rows[index2][5] > delitP[7]) //voir si la durée retard dépasse la durée de retard permise
					{	
						retard += (int)allAbsanceInfo1.Rows[index2][5] - delitP[7]; 
						heure -= (int)allAbsanceInfo1.Rows[index2][5]; 
					}
				}
				else //heure supp
				{
					heuresupp += -1 * (int)allAbsanceInfo1.Rows[index2][5]; 
				}
				if ((int)allAbsanceInfo1.Rows[index2][6] > 0) 
				{
					heuresupp += (int)allAbsanceInfo1.Rows[index2][6]; 
				}
				else 
				{
					if((-1*(int)allAbsanceInfo1.Rows[index2][6]) > delitP[8]) //voir si la durée retard dépasse la durée de retard permise
					{
						retard += (-1* (int)allAbsanceInfo1.Rows[index2][6]) - delitP[8]; 
						heure -= (-1* (int)allAbsanceInfo1.Rows[index2][6]);
					}
				}
			}
		}
	}
}
	
