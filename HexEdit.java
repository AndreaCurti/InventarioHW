/**
* il programma legge in esadecimale il contenuto di un file
*
* @author Andrea Curti
* @version 22.12.2020
*/

import java.io.*;
import java.nio.file.*;


public class HexEdit{
	public static void main(String[] args){
		if(args.length > 0){
			try{
				Path p = Paths.get(args[0]);
				if(Files.exists(p)){
					if(Files.isReadable(p)){
						byte[] text = Files.readAllBytes(p);
						String end = "";
						int start = 0;
						int valori = 16;
						for(int i = 0; i < text.length / 16; i++){
							System.out.printf("%04d | ", i*0xA);
							for(int j = start; j < valori; j++){
								if(text[j] < 16){
									end = "0"+Integer.toHexString(text[j]);
								}else{
									end = Integer.toHexString(text[j]);
								}
								System.out.printf("%s ", end);
							}
							System.out.println("");
							start = valori;
							valori += 16;
						}
					}else{
						System.out.println("File cannot be open");
					}
				}else{
					System.out.println("File does not exists");
				}
			}catch(IOException e){
				System.out.println("File is not accesible");
			}
		}else{
			System.out.println("Argument is missing");
		}
	}
}