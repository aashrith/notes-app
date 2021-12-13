import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

const API_URL = 'http://localhost:8081';
@Injectable({
  providedIn: 'root'
})
export class TagsService {

  constructor(private http: HttpClient) { }

  public getTags(): Observable<any> {
    return this.http.get(API_URL + '/api/tags').pipe(map(res => res));
  }

  public createTag(requestBody: { name: string; }): Observable<any> {
    return this.http.post(API_URL + '/api/tags', requestBody).pipe(map(res => res));
  }

  public deleteTag(id: number): Observable<any> {
    return this.http.delete(API_URL + '/api/tags/'+id).pipe(map(res => res));
  }
}
