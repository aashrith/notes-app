import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

const API_URL = 'http://192.168.68.103:8081';
@Injectable({
  providedIn: 'root'
})
export class NotesService {

  constructor(private http: HttpClient) { }

  public getNotes(): Observable<any> {
    return this.http.get(API_URL + '/api/notes').pipe(map(res => res));
  }

  public createNote(requestBody: { title: string; description: string; tags: Array<string> }): Observable<any> {
    return this.http.post(API_URL + '/api/notes', requestBody).pipe(map(res => res));
  }
 }
